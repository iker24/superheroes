<?php

/* ::base.html.twig */
class __TwigTemplate_ecc2182706adc57c950d34cefbe3ef7b6d232984f3df02be968c2c1411230c5a extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'stylesheets' => array($this, 'block_stylesheets'),
            'cabecera' => array($this, 'block_cabecera'),
            'cuerpo' => array($this, 'block_cuerpo'),
            'pie' => array($this, 'block_pie'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />
        <title>";
        // line 5
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
        ";
        // line 6
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 7
        echo "        <link rel=\"icon\" type=\"image/x-icon\" href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("favicon.ico"), "html", null, true);
        echo "\" />
    </head>
    <body>
        
        <div id=\"cabecera\">
            ";
        // line 12
        $this->displayBlock('cabecera', $context, $blocks);
        // line 15
        echo "        </div>
       
         <div id=\"cuerpo\">
            ";
        // line 18
        $this->displayBlock('cuerpo', $context, $blocks);
        // line 19
        echo "        </div>
        
         <div id=\"pie\">
            ";
        // line 22
        $this->displayBlock('pie', $context, $blocks);
        // line 23
        echo "        </div>
       
    </body>
</html>























";
    }

    // line 5
    public function block_title($context, array $blocks = array())
    {
        echo "SuperHeroes";
    }

    // line 6
    public function block_stylesheets($context, array $blocks = array())
    {
    }

    // line 12
    public function block_cabecera($context, array $blocks = array())
    {
        // line 13
        echo "    
            ";
    }

    // line 18
    public function block_cuerpo($context, array $blocks = array())
    {
    }

    // line 22
    public function block_pie($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "::base.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  116 => 22,  111 => 18,  106 => 13,  103 => 12,  98 => 6,  92 => 5,  61 => 23,  59 => 22,  54 => 19,  52 => 18,  47 => 15,  45 => 12,  36 => 7,  34 => 6,  30 => 5,  24 => 1,  89 => 36,  82 => 31,  70 => 25,  64 => 22,  57 => 18,  51 => 17,  48 => 16,  44 => 15,  31 => 4,  28 => 3,);
    }
}
