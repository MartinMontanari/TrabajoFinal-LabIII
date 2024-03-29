<?php


namespace App\Domain\Interfaces;


use App\Domain\Entities\Provider;

interface ProviderRepository
{
    /**
     * @param Provider $provider
     */
    public function persist(Provider $provider) : void;

    /**
     * @param int $code
     * @return Provider
     */
    public function getOneByCode(string $code) : ?Provider;

    /**
     * @param int $page
     * @param int $size
     * @return mixed
     */
    public function findAll(int $page, int $size);

    /**
     * @param int $id
     */
    public function deleteOneById(int $id) : void;

    /**
     * @param int $id
     * @return Provider
     */
    public function getOneByIdOrFail(int $id) : Provider;
}
