<?php

declare(strict_types=1);

namespace Codenames\Dimension;

class Dimensions
{
    /** @var int */
    private $width;

    /** @var int */
    private $height;

    /**
     * Create a new dimensions instance.
     *
     * @param int $width
     * @param int $height
     *
     * @throws DimensionException if the width is not a positive integer
     * @throws DimensionException if the height is not a positive integer
     */
    public function __construct(int $width, int $height)
    {
        $this->checkWidth($width);
        $this->checkHeight($height);

        $this->width = $width;
        $this->height = $height;
    }

    /**
     * Get the width of the dimensions.
     *
     * @return int
     */
    public function getWidth(): int
    {
        return $this->width;
    }

    /**
     * Get the height of the dimensions.
     *
     * @return int
     */
    public function getHeight(): int
    {
        return $this->height;
    }

    /**
     * Get the area of the dimensions.
     *
     * @return int
     */
    public function getArea(): int
    {
        return $this->width * $this->height;
    }

    /**
     * Determine if the given x value is within the dimensions.
     *
     * @param int $x
     *
     * @return bool
     */
    public function isValidX(int $x): bool
    {
        return $x >= 0 && $x < $this->width;
    }

    /**
     * Determine if the given y value is within the dimensions.
     *
     * @param int $y
     *
     * @return bool
     */
    public function isValidY(int $y): bool
    {
        return $y >= 0 && $y < $this->height;
    }

    /**
     * Determine if the given dimensions object is equal.
     *
     * @param Dimensions $dimensions
     *
     * @return bool
     */
    public function equals(Dimensions $dimensions): bool
    {
        return $this->width === $dimensions->getWidth() &&
            $this->height === $dimensions->getHeight();
    }

    /**
     * @param int $width
     *
     * @throws DimensionException if the width is not a positive integer
     */
    private function checkWidth(int $width): void
    {
        if ($width < 1) {
            throw new DimensionException('Width must be a positive integer.');
        }
    }

    /**
     * @param int $height
     *
     * @throws DimensionException if the height is not a positive integer
     */
    private function checkHeight(int $height): void
    {
        if ($height < 1) {
            throw new DimensionException('Height must be a positive integer.');
        }
    }
}
