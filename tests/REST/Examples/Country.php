<?php
declare(strict_types=1);

namespace MVQN\REST\Examples;

use MVQN\REST\Annotations\EndpointAnnotation;
use MVQN\REST\Annotations\EndpointAnnotation as Endpoint;
use MVQN\REST\Annotations\PostRequiredAnnotation as PostRequired;
use MVQN\REST\Annotations\CachedAnnotation as Cached;

use MVQN\REST\Endpoints\EndpointObject;
use MVQN\REST\Examples\Helpers\CountryHelper;

/**
 * Class Country
 *
 * @package UCRM\REST\Endpoints
 * @author Ryan Spaeth <rspaeth@mvqn.net>
 * @final
 *
 * @Cached
 *
 * @Endpoint { "get": "/countries", "getById": "/countries/:id" }
 * @EndpointAnnotation [ "post" => "/countries" ]
 * @MVQN\REST\Annotations\EndpointAnnotation { "patch": "/countries/:id" }
 *
 * @method string|null getName()
 * @method string|null getCode()
 */
final class Country extends EndpointObject
{
    use CountryHelper;

    // =================================================================================================================
    // PROPERTIES
    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var string
     * @PostRequired
     */
    protected $name;

    // -----------------------------------------------------------------------------------------------------------------

    /**
     * @var string
     * @PostRequired `$this->name === "United States"`
     */
    protected $code;

}

