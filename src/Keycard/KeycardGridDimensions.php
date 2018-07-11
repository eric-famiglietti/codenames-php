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
     * @param int $width
     * @param int $height
     */
    public function __construct(int $width, int $height)
    {
        $this->checkWidth($width);
        $this->checkHeight($height);

        $this->width = $width;
        $this->height = $height;
    }

    /**
     * @return int
     */
    public function getWidth(): int
    {
        return $this->width;
    }

    /**
     * @return int
     */
    public function getHeight(): int
    {
        return $this->height;
    }

    /**
     * @param int $width
     *
     * @throws KeycardException
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
     * @throws KeycardException
     */
    private function checkHeight(int $height): void
    {
        if ($height < 1) {
            throw new KeycardException('Height must be a positive integer.');
        }
    }
}
