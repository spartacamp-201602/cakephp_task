<?php

class Note extends AppModel
{
    public $belongsTo = array('Task');
    // Note は所属している Task に
}