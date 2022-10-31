<?php
declare(strict_types=1);

namespace SpaethTech\REST\Examples;

use SpaethTech\REST\Annotations\EndpointAnnotation;
use SpaethTech\REST\Annotations\EndpointAnnotation as Endpoint;
use SpaethTech\REST\Annotations\PostRequiredAnnotation as PostRequired;
use SpaethTech\REST\Annotations\CachedAnnotation as Cached;

use SpaethTech\REST\Endpoints\EndpointObject;
use SpaethTech\REST\Examples\Helpers\CountryHelper;

/**
 * Class Country
 *
 * @package UCRM\REST\Endpoints
 * @author Ryan Spaeth <rspaeth@spaethtech.com>
 * @final
 *
 * @Cached
 *
 * @Endpoint { "get": "/countries", "getById": "/countries/:id" }
 * @EndpointAnnotation [ "post" => "/countries" ]
 * @SpaethTech\REST\Annotations\EndpointAnnotation { "patch": "/countries/:id" }
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
