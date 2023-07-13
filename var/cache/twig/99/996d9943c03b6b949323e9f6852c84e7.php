<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* /dashboard/dashboard.html */
class __TwigTemplate_42770fe347e69313fb523f73a43b7ab9 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1
        echo "<div 
    class=\"
    row-start-1 row-span-full col-start-3 col-end-13
    flex flex-col justify-start align-middle items-start
    w-full h-full\">

    <div 
        class=\"
        flex flex-row justify-start align-middle items-center space-x-4
        w-full h-fit px-6 py-4\">

        <h1 class=\"font-title font-bold text-3xl text-zinc-900\">Dashboard</h1>
    
    </div>

</div>";
    }

    public function getTemplateName()
    {
        return "/dashboard/dashboard.html";
    }

    public function getDebugInfo()
    {
        return array (  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<div 
    class=\"
    row-start-1 row-span-full col-start-3 col-end-13
    flex flex-col justify-start align-middle items-start
    w-full h-full\">

    <div 
        class=\"
        flex flex-row justify-start align-middle items-center space-x-4
        w-full h-fit px-6 py-4\">

        <h1 class=\"font-title font-bold text-3xl text-zinc-900\">Dashboard</h1>
    
    </div>

</div>", "/dashboard/dashboard.html", "/var/www/templates/dashboard/dashboard.html");
    }
}
