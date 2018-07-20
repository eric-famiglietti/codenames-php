<?php

declare(strict_types=1);

namespace Codenames\Keycard;

class KeycardGridDimensions
{
    /** @var int */
    private $width;

    /** @var int */
    private $height;

    /**
     * Create a new keycard grid dimensions instance.
     *
     * @param int $width
     * @param int $height
     *
     * @throws KeycardException if the width is not a positive integer
     * @throws KeycardException if the height is not a positive integer
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
     * @param int $width
     *
     * @throws KeycardException if the width is not a positive integer
     */
    private function checkWidth(int $width): void
    {
        if ($width < 1) {
            throw new KeycardException('Width must be a positive integer.');
        }
    }

    /**
     * @param int $height
     *
     * @throws KeycardException if the height is not a positive integer
     */
    private function checkHeight(int $height): void
    {
        if ($height < 1) {
            throw new KeycardException('Height must be a positive integer.');
        }
    }
}
