<?php

class Company extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    public $id;

    /**
     *
     * @var string
     */
    public $name;

    /**
     *
     * @var string
     */
    public $short_name;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("sportisimo_ukol");
        $this->setSource("company");
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'company';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Company[]|Company|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Company|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

    public static function getList(array $config) {
        if ($config["order"]) $order_text = "name ASC";
        else $order_text = "name DESC";
        $companies = Company::find([
            "columns" => "id, short_name",
            "order" => $order_text,
        ])->toArray();
        if (!$companies) return false;
        $from = $config["lines"] * ($config["page"] - 1) - 1;
        $to = $config["lines"] + $from + 1;
        foreach ($companies as $key => $val) {
            if ($key > $from and $key < $to) $list[] = $val;
        }
        $pages = ceil(count($companies) / $config["lines"]);
        return array(
            "list" => $list,
            "pages" => $pages
        );
    }

}
