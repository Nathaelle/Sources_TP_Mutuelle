<?php

namespace Models;

interface Crud {

    function insert();
    function update();
    function delete();
    function select();
    function selectAll();
    
}