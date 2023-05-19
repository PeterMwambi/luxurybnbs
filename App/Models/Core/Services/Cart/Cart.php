<?php


class Cart
{
    /**
     * @var object $conn
     * The connection object
     */
    private $conn = null;
    /**
     * @var object $name
     * The product name
     */
    private $name = null;
    /**
     * @var int $id
     * The product Id
     */
    private $id = null;
    /**
     * @var int $price
     * The product price
     */
    private $price = null;
    /**
     * @var int $quantity
     * The product quantity
     */
    private $quantity = 1;
    /**
     * @var array $item
     * The generated item array
     */
    private $item = [];
    /**
     * @var array cart
     * The cart array
     */
    private $cart = [];
    /**
     * @var array data
     * The product data
     */
    private $data = [];

    /**
     * @param int $id The product id
     * @return mixed (false/array)
     * Initialize cart and item variables, gets the product id
     * Connects to the database
     */
    public function __construct()
    {
        //Initialize basic variables
        $this->item = array("name" => "", "price" => 0, "quantity" => 1, "total_price" => 0);
        $this->cart = array();
        $this->conn = new DatabaseHandler;
    }

    public function verifyProductId($id)
    {
        if (!empty($id) && is_string($id)) {
            $identifier = Sanitize::String($id);
            $this->conn->runSQL("SELECT products.product_id FROM products INNER JOIN product_details ON
            products.product_id = product_details.product_id WHERE products.product_id = ? LIMIT 1", array($identifier), 1);
            $count = $this->conn->getCount();
            if ($count) {
                $this->id = $identifier;
                return true;
            }
            return false;
        }
        return false;
    }

    protected function setItem()
    {

        if (!empty($this->id)) {
            $this->conn->runSQL("SELECT products.product_name,
        products.product_id,
        product_details.discounted_price
        FROM products INNER JOIN
        product_details ON
        products.product_id = product_details.product_id
        WHERE products.product_id = ? LIMIT 1", array($this->id), 1);
            if ($this->conn->getCount()) {
                $results = $this->conn->getOutput();
                $this->name = $results->product_name;
                $this->price = $results->discounted_price;
            }
            if (isset($this->name, $this->price, $this->id)) {
                $this->price = (int) $this->price;
                $this->item = array("id" => $this->id, "name" => $this->name, "price" => $this->price, "quantity" => 1);
                return true;
            } else {
                return false;
            }
        }
        return false;
    }
    /**
     * @param null
     * @return bool
     */
    public function insert()
    {
        if ($this->setItem() && isset($this->item)) {
            if ($this->item["quantity"] === 0) {
                return false;
            }
            $total = $this->item["price"] * $this->item["quantity"];
            $this->item["total_price"] = $total;
            $this->storage();
            return true;
        }
        return false;
    }
    /**
     * @param null
     * @return bool
     */
    protected function storage()
    {
        if (!is_array($this->item)) {
            return false;
        }
        if (isset($this->item)) {
            $this->cart = $this->item;
            $cartId = "";
            $cart = Session::get("cart");
            if (Session::exists("cart")) {
                for ($x = 0; $x <= count($cart); $x++) {
                    if ($this->id === $cart[$x]["id"]) {
                        $cartId .= $cart[$x]["id"];
                    }
                }
                if ($cartId === $this->id) {
                    return false;
                } else {
                    Session::generate("cart", $this->cart, "array");
                    return true;
                }
            } else {
                Session::generate("cart", $this->cart, "array");
                return true;
            }
        }
    }
    /**
     * @param null
     * @return int
     */
    public function getTotalPrice()
    {
        if (Session::exists("cart")) {
            $this->cart = Session::get("cart");
            $totalPrice = 0;
            foreach ($this->cart as $cart) {
                $totalPrice += $cart["total_price"];
            }
            return $totalPrice;
        } else {
            return 0;
        }
    }
    /**
     * @param null
     * @return bool
     */
    public function getTotalItems()
    {
        if (Session::exists("cart")) {
            $this->cart = Session::get("cart");
            $totalItems = count($this->cart);
            return $totalItems;
        }
        return 0;
    }
    /**
     * @param null
     * @return array
     */
    public function displayItems()
    {
        if (Session::exists("cart")) {
            $this->cart = Session::get("cart");
            return array_reverse($this->cart);
        } else {
            return array();
        }
    }
    /**
     * @param null
     * @return bool
     */
    public function displayQuantity(int $id = null)
    {
        if (Session::exists("cart")) {
            $this->cart = Session::get("cart");
            $quantity = 0;
            for ($i = 0; $i < count($this->cart); $i++) {
                if ((int) $this->cart[$i]["id"] === $id) {
                    $quantity = $this->cart[$i]["items"]["quantity"];
                }
            }
            return $quantity;
        }
        return false;
    }
    /**
     * @param null
     * @return mixed
     */
    public function delete(string $id)
    {
        if (Session::exists("cart")) {
            $this->cart = Session::get("cart");
            for ($i = 0; $i < count($this->cart); $i++) {
                if ($this->cart[$i]["id"] === $id) {
                    unset($this->cart[$i]);
                    $this->cart = array_values($this->cart);
                }
                Session::generate("cart", $this->cart);
            }
            return true;
        }
        return false;
    }
    /**
     * @param null
     * @return mixed
     */
    public function update($id = null, int $quantity = null)
    {
        if (!is_numeric($quantity) || $quantity < 0) {
            return false;
        }
        if (Session::exists("cart")) {
            $this->cart = Session::get("cart");
            for ($i = 0; $i < count($this->cart); $i++) {
                if ($this->cart[$i]["id"] === $id) {
                    $this->cart[$i]["quantity"] = $quantity;
                    $this->cart[$i]["total_price"] = $this->cart[$i]["quantity"] * $this->cart[$i]["price"];
                    $this->cart = array_values($this->cart);
                }
            }
            Session::generate("cart", $this->cart);
            return true;
        }
    }
    /**
     * @param null
     * @return bool
     */
    public function destroy()
    {
        if (Session::exists("cart")) {
            Session::destroy("cart");
            return true;
        }
        return false;
    }
}