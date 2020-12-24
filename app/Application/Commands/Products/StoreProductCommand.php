<?php


namespace App\Application\Commands\Products;


class StoreProductCommand
{

    private string $code;
    private string $name;
    private ?string $description;
    private int $price;
    private int $providerId;
    private int $categoryId;

    /**
     * StoreProductCommand constructor.
     * @param string $code
     * @param string $name
     * @param string|null $description
     * @param int $price
     * @param int $providerId
     * @param int $categoryId
     */
    public function __construct(string $code, string $name, ?string $description, int $price, int $providerId, int $categoryId)
    {
        $this->code = $code;
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
        $this->providerId = $providerId;
        $this->categoryId = $categoryId;
    }

    /**
     * @return string
     */
    public function getCode(): string
    {
        return $this->code;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @return int
     */
    public function getPrice(): int
    {
        return $this->price;
    }

    /**
     * @return int
     */
    public function getProviderId(): int
    {
        return $this->providerId;
    }

    /**
     * @return int
     */
    public function getCategoryId(): int
    {
        return $this->categoryId;
    }
}
