<?php

defined('MBQ_IN_IT') or exit;

/**
 * thank module field definition class
 */
Abstract Class MbqFdtThank extends MbqBaseFdt {
    
    public static $df = array(
        'MbqEtThank' => array(
            'type' => array(
                'range' => array(
                    'thankForumPost' => 'thankForumPost'
                )
            )
        )
    );
  
}
MbqBaseFdt::$df['MbqFdtThank'] = &MbqFdtThank::$df;
