<?php

class Item
{
  var $item_id;
  var $item_name;
  var $qty;
  var $price;
  // var $deleted = false;

  function get_item_cost()
  {
    return $this->qty * $this->price;
  }

  function __construct($item_id, $item_name, $qty, $price)
  {
    $this->item_id = $item_id;
    $this->item_name = $item_name;
    $this->qty = $qty;
    $this->price = $price;
  }

  function get_item_id()
  {
    return $this->item_id;
  }

  function get_item_name()
  {
    return $this->item_name;
  }

  function get_qty()
  {
    return $this->qty;
  }

  function get_price()
  {
    return $this->price;
  }

  function set_qty($qty)
  {
    $this->qty = $qty;
  }
}

class Cart
{
  var $items;
  var $depth;

  function __construct()
  {
    $this->items = [];
    $this->depth = 0;
  }

  function add_item($item)
  {
    $this->items[$this->depth] = $item;
    $this->depth++;
  }

  // Modified function to remove item from array and update depth, this removes the need for the deleted attribute in Item object and check on view cart
  function delete_item($item_no)
  {
    // if there is an item matching the index
    if (isset($this->items[$item_no])) {
      // unset the item from items array
      unset($this->items[$item_no]);
      // reset items array keys
      $this->items = array_values($this->items);
      // update cart depth
      $this->depth--;
    }
  }

  function update_quantity($item_no, $qty)
  {
    $id = $this->items[$item_no]->get_item_id();

    if ($qty == 0) {
      $this->delete_item($item_no);
    } elseif ($qty > 0 && $qty != $this->items[$item_no]->get_qty()) {
      $this->items[$item_no]->set_qty($qty);
    }
  }

  function get_depth()
  {
    return $this->depth;
  }

  function get_item($item_no)
  {
    return $this->items[$item_no];
  }
}

?>