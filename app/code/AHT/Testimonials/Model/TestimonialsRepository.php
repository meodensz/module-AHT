<?php
namespace AHT\Testimonials\Model;

use AHT\Testimonials\Api\Data;
use AHT\Testimonials\Api\TestimonialsRepositoryInterface;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;
use AHT\Testimonials\Model\ResourceModel\Testimonials as ResourcePost;
use AHT\Testimonials\Model\ResourceModel\Testimonials\CollectionFactory as PostCollectionFactory;
use AHT\Testimonials\Api\Data\TestimonialsInterface;

/**
 * Class PostRepository
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 */
class TestimonialsRepository implements TestimonialsRepositoryInterface
{
    /**
     * @var ResourcePost
     */
    protected $resource;

    /**
     * @var PostFactory
     */
    protected $PostFactory;

    /**
     * @var PostCollectionFactory
     */
    protected $PostCollectionFactory;

    /**
     * @var Data\PostSearchResultsInterfaceFactory
     */
    protected $searchResultsFactory;
    /**
     * @param ResourcePost $resource
     * @param PostFactory $PostFactory
     * @param Data\TestimonialsInterfaceFactory $dataPostFactory
     * @param PostCollectionFactory $PostCollectionFactory
     * @param Data\PostSearchResultsInterfaceFactory $searchResultsFactory
     */
    private $collectionProcessor;

    public function __construct(
        ResourcePost $resource,
        TestimonialsFactory $PostFactory,
        Data\TestimonialsInterfaceFactory $dataPostFactory,
        PostCollectionFactory $PostCollectionFactory
    ) {
        $this->resource = $resource;
        $this->PostFactory = $PostFactory;
        $this->PostCollectionFactory = $PostCollectionFactory;
        // $this->searchResultsFactory = $searchResultsFactory;
        // $this->collectionProcessor = $collectionProcessor ?: $this->getCollectionProcessor();
    }

    /**
     * Save Post data
     *
     * @param  \AHT\Testimonials\Api\Data\TestimonialsInterface $post
     * @return \AHT\Testimonials\Api\Data\TestimonialsInterface
     */
    public function save(TestimonialsInterface $post)
    {
        try {
            $this->resource->save($post);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(
                __('Could not save the Post: %1', $exception->getMessage()),
                $exception
            );
        }

        return $post;
    }

    /**
     * Load Post data by given Post Identity
     *
     * @param [type] $id
     * @return \AHT\Testimonials\Model\ResourceModel\Testimonials
     */
    public function getById($id)
    {
        $postId = intval($id);
        $Post = $this->PostFactory->create();
        $Post->load($postId);
        if (!$Post->getId()) {
            throw new NoSuchEntityException(__('The CMS Post with the "%1" ID doesn\'t exist.', $postId));
        }
        $result = $Post;
        return $result;
    }
     /**
     * function get all data
     *
     * @return \AHT\Testimonials\Api\Data\TestimonialsInterface
     */
    public function getList()
    {
        $collection = $this->PostCollectionFactory->create();
        return $collection->getData();
    }

    /**
     * Create post.
     *
     * @return \AHT\Testimonials\Api\Data\TestimonialsInterface
     *
     * @throws LocalizedException
     */
    public function createPost(TestimonialsInterface $post)
    {
        try {
            $this->resource->save($post);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(
                __('Could not save the Post: %1', $exception->getMessage()),
                $exception
            );
        }
        return json_encode(array(
            "status" => 200,
            "message" => $post->getData()
        ));

    }


    public function updatePost(String $id, TestimonialsInterface $post)
    {

        try {
            $objPost = $this->PostFactory->create();
            $id = intval($id);
            $objPost->setId($id);
            //Set full collum
            $objPost->setData($post->getData());
            $this->resource->save($objPost);

            return $objPost->getData();
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(
                __('Could not save the Post: %1', $exception->getMessage()),
                $exception
            );
        }
    }

    public function deleteById($postId)
    {
        $id = intval($postId);
        if($this->resource->delete($this->getById($id))) {
            return json_encode([
                "status" => 200,
                "message" => "Successfully"
            ]);
        }
    }
}
