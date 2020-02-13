<?php
declare(strict_types=1);

namespace MVQN\REST\Annotations;

use Exception;
use MVQN\Annotations\Annotation;
use MVQN\Common\Arrays;
use MVQN\Common\Patterns;

/**
 * Class EndpointAnnotation
 *
 * @package MVQN\REST\Annotations
 */
final class EndpointAnnotation extends Annotation
{
    /** @const int Denotes supported annotation targets, defaults to ANY when not explicitly provided! */
    public const SUPPORTED_TARGETS = Annotation::TARGET_CLASS;

    /** @const bool Denotes supporting multiple declarations of this annotation per block, defaults to TRUE! */
    public const SUPPORTED_DUPLICATES = true;

    /**
     * Handles parsing of the annotation.
     *
     * @param array $existing Any existing annotations that were parsed from previous declaration of the same type.
     * @return array Returns an array of keyword => value(s) parsed by this Annotation implementation.
     * @throws Exception
     */
    public function parse(array $existing = []): array
    {


        if(Patterns::isJSON($this->value) || Patterns::isArray($this->value))
        {
            $existing = Arrays::combineResults($existing, "Endpoint", $this->value, Arrays::COMBINE_MODE_MERGE);
        }

        return $existing;
    }
}
