<?php

namespace AHT\Testimonials\Api\Data;

interface TestimonialsInterface
{
	const ID = 'id';

    /**
     * Get testimonials id
     *
     * @return int|null
     */
    public function getId();

    /**
     * Set testimonials id
     *
     * @param int $id
     * @return @this
     */
    public function setId($id);

    /**
     * Get testimonials title
     *
     * @return string|null
     */
    public function getTitle();

    /**
     * Set testimonials title
     *
     * @param string $title
     * @return null
     */
    public function setTitle($title);

    /**
     * Get testimonials images
     *
     * @return string|null
     */
    public function getImages();

    /**
     * Set testimonials images
     *
     * @param string $images
     * @return null
     */
    public function setImages($images);

    /**
     * Get testimonials categoryid
     *
     * @return int|null
     */
    public function getCategoryid();

    /**
     * Set testimonials categoryid
     *
     * @param int $categoryid
     * @return @this
     */
    public function setCategoryid($categoryid);

    /**
     * Get testimonials description
     *
     * @return string|null
     */
    public function getDescription();

    /**
     * Set testimonials description
     *
     * @param string $description
     * @return null
     */
    public function setDescription($description);

    /**
     * Get testimonials price
     *
     * @return string|null
     */
    public function getPrice();

    /**
     * Set testimonials price
     *
     * @param string $price
     * @return null
     */
    public function setPrice($price);

    /**
     * Get testimonials content
     *
     * @return string|null
     */
    public function getContent();

    /**
     * Set testimonials content
     *
     * @param string $content
     * @return null
     */
    public function setContent($content);
}
