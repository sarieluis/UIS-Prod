<?php

/**
 * @description this class is responsible for coordinating actions and filters between the core plugin and the
 * administration class.
 *
 * Class InmanageFibonatixLoader
 */
class InmanageFibonatixLoader {

  /**
   * Will hold all actions that will be later called
   * @var array
   */
  protected $actions;

  /**
   * Will hold all filters that will be later called
   * @var array
   */
  protected $filters;

  /**
   * InmanageFibonatixLoader constructor.
   */
  public function __construct () {

    $this->actions = array();
    $this->filters = array();
  }

  /**
   * @param $hook
   * @param $component
   * @param $callback
   */
  public function add_action ( $hook, $component, $callback ) {

    $this->actions = $this->add( $this->actions, $hook, $component, $callback );
  }

  /**
   * @param $hook
   * @param $component
   * @param $callback
   */
  public function add_filter ( $hook, $component, $callback ) {

    $this->filters = $this->add( $this->filters, $hook, $component, $callback );
  }

  /**
   * @param $hooks
   * @param $hook
   * @param $component
   * @param $callback
   * @return array
   */
  private function add ( $hooks, $hook, $component, $callback ) {

    $hooks[] = array(

      'hook'      => $hook,
      'component' => $component,
      'callback'  => $callback
    );

    return $hooks;
  }

  /**
   * @description Runs all actions and filters that were previously added to $filters and $hooks
   */
  public function run() {


    foreach( $this->filters as $hook ) {

      add_filter( $hook['hook'], array( $hook['component'], $hook['callback'] ) );
    }

    foreach( $this->actions as $hook ) {

      add_action( $hook['hook'], array( $hook['component'], $hook['callback'] ) );
    }
  }

}