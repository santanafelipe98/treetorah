<?php
    interface DAO
    {
        public function find($id);
        public function findAll();
        public function update($m);
        public function delete($m);
    }