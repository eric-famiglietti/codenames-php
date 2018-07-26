<?php

declare(strict_types=1);

namespace Codenames\Grid;

use Codenames\Dimension\Dimensions;

class Grid
{
    /** @var Dimensions */
    private $dimensions;

    /** @var array */
    private $values = [];

    /**
     * Create a new grid instance.
     *
     * @param Dimensions $dimensions
     * @param array      $values
     *
     * @throws GridException if the grid width does not match the dimensions width
     * @throws GridException if the grid height does not match the dimensions height
     */
    public function __construct(Dimensions $dimensions, array $values)
    {
        $this->checkGridWidth($values, $dimensions);
        $this->checkGridHeight($values, $dimensions);

        $this->dimensions = $dimensions;
        $this->values = $values;
    }

    /**
     * Get the dimensions of the grid.
     *
     * @return Dimensions
     */
    public function getDimensions(): Dimensions
    {
        return $this->dimensions;
    }

    /**
     * Get the values of the grid.
     *
     * @return array
     */
    public function getValues(): array
    {
        return $this->values;
    }

    /**
     * @param array      $values
     * @param Dimensions $dimensions
     *
     * @throws GridException if the grid width does not match the dimensions width
     */
    private function checkGridWidth(array $values, Dimensions $dimensions): void
    {
        if (count($values) !== $dimensions->getWidth()) {
            throw new GridException('Grid width does not match dimensions width.');
        }
    }

    /**
     * @param array      $values
     * @param Dimensions $dimensions
     *
     * @throws GridException if the grid height does not match the dimensions height
     */
    private function checkGridHeight(array $values, Dimensions $dimensions): void
    {
        $height = $dimensions->getHeight();

        foreach ($values as $column) {
            if (count($column) !== $height) {
                throw new GridException('Grid height does not match dimensions height.');
            }
        }
    }
}
