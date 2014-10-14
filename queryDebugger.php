<?php

class queryDebugger{
    const QUESTION_MARK = '/\?/';
    const NAMED_PLACE_HOLDER = '/:[a-z0-9_]+/i';

    private $placeHolder;

    public function setValues($query, $values){

        if(count($values) == 0)  throw new exception('Empty values');

        $this->setplaceHolder($query);
        $placeHolder = array_fill(0, count($values), $this->placeHolder);

        preg_match_all($this->placeHolder, $query, $queryPlaceHolders);

        if(count($placeHolder) != count($queryPlaceHolders[0])){
            throw new exception ('The number of placeholders does not match with values in: ' .$query. ' values: '.count($placeHolder));
        }

        $newQuery = preg_replace($placeHolder, $values, $query, 1);

        return $newQuery;
    }

    private function setPlaceHolder($query){
        (preg_match(queryDebugger::QUESTION_MARK, $query)) ? $this->placeHolder = queryDebugger::QUESTION_MARK : $this->placeHolder = queryDebugger::NAMED_PLACE_HOLDER;
    }

}
