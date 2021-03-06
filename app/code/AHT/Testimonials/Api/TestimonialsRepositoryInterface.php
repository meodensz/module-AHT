<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace AHT\Testimonials\Api;

use Magento\Framework\Api\SearchCriteriaInterface;

/**
 * CMS post CRUD interface.
 * @api
 * @since 100.0.2
 */
interface TestimonialsRepositoryInterface
{
    /**
     * Save post.
     *
     * @param \AHT\Testimonials\Api\Data\TestimonialsInterface $post
     * @return \AHT\Testimonials\Api\Data\TestimonialsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function save(\AHT\Testimonials\Api\Data\TestimonialsInterface $post);

    /**
     * @return \AHT\Testimonials\Api\Data\TestimonialsInterface
     */
    public function getById(String $id);

    /**
     * Get All
     *
     * @return \AHT\Testimonials\Api\Data\TestimonialsInterface
     */
    public function getList();

    /**
     * Create post.
     *
     * @param \AHT\Testimonials\Api\Data\TestimonialsInterface $post
     *
     * @return \AHT\Testimonials\Api\Data\TestimonialsInterface
     */
    public function createPost(\AHT\Testimonials\Api\Data\TestimonialsInterface $post);

    /**
     * Update post
     *
     * @param String $id
     * @param \AHT\Blog\Api\Data\PostInterface $post
     *
     * @return null
     */
    public function updatePost(String $id, \AHT\Testimonials\Api\Data\TestimonialsInterface $post);

    /**
     * Delete Post by ID.
     *
     * @param string $postId
     * @return \AHT\Testimonials\Api\Data\TestimonialsInterface
     */
    public function deleteById($postId);
}
