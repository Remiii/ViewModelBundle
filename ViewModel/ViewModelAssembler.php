<?php

namespace gotakk\ViewModelBundle\ViewModel;

use gotakk\ViewModelBundle\ViewModel\ViewModelNode;
use gotakk\ViewModelBundle\Service\ViewModelValidator;
use Symfony\Component\Yaml\Parser;

class ViewModelAssembler
{
    protected $skel;

    public function validate(ViewModelNode $vm, $skel = null)
    {
        if ($skel == null)
            $skel = $this->skel;

        foreach ($skel as $key => $value)
        {
            if (!is_array($value)) {
                if (!isset($vm[$value]))
                    throw new \Exception("$value not exists");
            }

            elseif (empty($value)) {
                foreach ($vm[$key] as $k => $v) {
                    if (!is_numeric($k))
                        throw new \Exception("$key is not sequential array. Contains not numeric key ($k)");
                }
            }

            else {
                if (!isset($vm[$key]))
                    throw new \Exception("$key not exists");
                $this->validate($vm[$key], $value);
            }
        }
        return true;
    }

    public function reverseValidate(ViewModelNode $vm, $skel = null)
    {
        if ($skel == null) {
            $skel = $this->skel;
        }

        foreach ($vm as $key => $value)
        {
            if (!is_array($value)) {
                if (!value_in_array($skel, $value))
                    throw new \Exception("$value not exists");
            }

            elseif (empty($value)) {
                foreach ($skel[$key] as $k => $v) {
                    if (!is_numeric($k))
                        throw new \Exception("$key is not sequential array. Contains not numeric key ($k)");
                }
            }

            else {
                if (!isset($skel[$key]))
                    throw new \Exception("$key not exists");
                $this->validate($skel[$key], $value);
            }
        }

        return true;
    }
}