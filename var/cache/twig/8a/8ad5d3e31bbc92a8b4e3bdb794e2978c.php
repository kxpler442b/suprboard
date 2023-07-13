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

/* sidebar.html */
class __TwigTemplate_68d44ab85247958a43102ef88e85ecf8 extends Template
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
        echo "<div class=\"
    row-start-1 row-span-full col-start-1 col-end-3
    flex flex-col justify-start align-middle items-start space-y-4
    w-full h-full py-4
    bg-zinc-950\">

    <div class=\"
        flex flex-row justify-start align-middle items-center space-x-4
        w-full px-6 py-4\">

        <svg xmlns=\"http://www.w3.org/2000/svg\" width=\"32\" height=\"32\" fill=\"#ffffff\" viewBox=\"0 0 256 256\"><path d=\"M232,56V200a16,16,0,0,1-16,16H40a16,16,0,0,1-16-16V56A16,16,0,0,1,40,40H216A16,16,0,0,1,232,56Z\" opacity=\"0.2\"></path><path d=\"M200,128a8,8,0,0,1-8,8H64a8,8,0,0,1,0-16H192A8,8,0,0,1,200,128Zm32-56H24a8,8,0,0,0,0,16H232a8,8,0,0,0,0-16Zm-80,96H104a8,8,0,0,0,0,16h48a8,8,0,0,0,0-16Z\"></path></svg>
        <h1 class=\"font-title font-extrabold text-2xl text-zinc-50\">HYP3R_M2M</h1>
    </div>

    <div class=\"
        flex flex-col justify-start align-middle items-center space-y-4
        w-full h-fit py-4\">

        <a
            href=\"";
        // line 20
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["globals"] ?? null), "base_url", [], "any", false, false, false, 20), "html", null, true);
        echo "/web/dashboard\"
            class=\"
                inline-flex flex-row justify-start align-middle items-center space-x-4
                w-full px-4 py-2
                hover:bg-zinc-700
                transition-all ease-in-out duration-100\">

            <svg xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" fill=\"#ffffff\" viewBox=\"0 0 256 256\"><path d=\"M216,115.54V208a8,8,0,0,1-8,8H160a8,8,0,0,1-8-8V160a8,8,0,0,0-8-8H112a8,8,0,0,0-8,8v48a8,8,0,0,1-8,8H48a8,8,0,0,1-8-8V115.54a8,8,0,0,1,2.62-5.92l80-75.54a8,8,0,0,1,10.77,0l80,75.54A8,8,0,0,1,216,115.54Z\" opacity=\"0.2\"></path><path d=\"M218.83,103.77l-80-75.48a1.14,1.14,0,0,1-.11-.11,16,16,0,0,0-21.53,0l-.11.11L37.17,103.77A16,16,0,0,0,32,115.55V208a16,16,0,0,0,16,16H96a16,16,0,0,0,16-16V160h32v48a16,16,0,0,0,16,16h48a16,16,0,0,0,16-16V115.55A16,16,0,0,0,218.83,103.77ZM208,208H160V160a16,16,0,0,0-16-16H112a16,16,0,0,0-16,16v48H48V115.55l.11-.1L128,40l79.9,75.43.11.1Z\"></path></svg>
            <p class=\"font-medium text-zinc-50\">Dashboard</p>
        </a>

        <a
            href=\"";
        // line 32
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["globals"] ?? null), "base_url", [], "any", false, false, false, 32), "html", null, true);
        echo "/web/sources\"
            class=\"
                inline-flex flex-row justify-start align-middle items-center space-x-4
                w-full px-4 py-2
                hover:bg-zinc-700
                transition-all ease-in-out duration-100\">

                <svg xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" fill=\"#ffffff\" viewBox=\"0 0 256 256\"><path d=\"M176,120v72H80V120Z\" opacity=\"0.2\"></path><path d=\"M213.66,82.34l-56-56A8,8,0,0,0,152,24H56A16,16,0,0,0,40,40V216a16,16,0,0,0,16,16H200a16,16,0,0,0,16-16V88A8,8,0,0,0,213.66,82.34ZM200,216H56V40h92.69L200,91.31V216ZM176,112H80a8,8,0,0,0-8,8v72a8,8,0,0,0,8,8h96a8,8,0,0,0,8-8V120A8,8,0,0,0,176,112Zm-8,72H152V152a8,8,0,0,0-16,0v32H120V152a8,8,0,0,0-16,0v32H88V128h80Z\"></path></svg>
            <p class=\"font-medium text-zinc-50\">Sources</p>
        </a>

    </div>

</div>";
    }

    public function getTemplateName()
    {
        return "sidebar.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  73 => 32,  58 => 20,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<div class=\"
    row-start-1 row-span-full col-start-1 col-end-3
    flex flex-col justify-start align-middle items-start space-y-4
    w-full h-full py-4
    bg-zinc-950\">

    <div class=\"
        flex flex-row justify-start align-middle items-center space-x-4
        w-full px-6 py-4\">

        <svg xmlns=\"http://www.w3.org/2000/svg\" width=\"32\" height=\"32\" fill=\"#ffffff\" viewBox=\"0 0 256 256\"><path d=\"M232,56V200a16,16,0,0,1-16,16H40a16,16,0,0,1-16-16V56A16,16,0,0,1,40,40H216A16,16,0,0,1,232,56Z\" opacity=\"0.2\"></path><path d=\"M200,128a8,8,0,0,1-8,8H64a8,8,0,0,1,0-16H192A8,8,0,0,1,200,128Zm32-56H24a8,8,0,0,0,0,16H232a8,8,0,0,0,0-16Zm-80,96H104a8,8,0,0,0,0,16h48a8,8,0,0,0,0-16Z\"></path></svg>
        <h1 class=\"font-title font-extrabold text-2xl text-zinc-50\">HYP3R_M2M</h1>
    </div>

    <div class=\"
        flex flex-col justify-start align-middle items-center space-y-4
        w-full h-fit py-4\">

        <a
            href=\"{{ globals.base_url }}/web/dashboard\"
            class=\"
                inline-flex flex-row justify-start align-middle items-center space-x-4
                w-full px-4 py-2
                hover:bg-zinc-700
                transition-all ease-in-out duration-100\">

            <svg xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" fill=\"#ffffff\" viewBox=\"0 0 256 256\"><path d=\"M216,115.54V208a8,8,0,0,1-8,8H160a8,8,0,0,1-8-8V160a8,8,0,0,0-8-8H112a8,8,0,0,0-8,8v48a8,8,0,0,1-8,8H48a8,8,0,0,1-8-8V115.54a8,8,0,0,1,2.62-5.92l80-75.54a8,8,0,0,1,10.77,0l80,75.54A8,8,0,0,1,216,115.54Z\" opacity=\"0.2\"></path><path d=\"M218.83,103.77l-80-75.48a1.14,1.14,0,0,1-.11-.11,16,16,0,0,0-21.53,0l-.11.11L37.17,103.77A16,16,0,0,0,32,115.55V208a16,16,0,0,0,16,16H96a16,16,0,0,0,16-16V160h32v48a16,16,0,0,0,16,16h48a16,16,0,0,0,16-16V115.55A16,16,0,0,0,218.83,103.77ZM208,208H160V160a16,16,0,0,0-16-16H112a16,16,0,0,0-16,16v48H48V115.55l.11-.1L128,40l79.9,75.43.11.1Z\"></path></svg>
            <p class=\"font-medium text-zinc-50\">Dashboard</p>
        </a>

        <a
            href=\"{{ globals.base_url }}/web/sources\"
            class=\"
                inline-flex flex-row justify-start align-middle items-center space-x-4
                w-full px-4 py-2
                hover:bg-zinc-700
                transition-all ease-in-out duration-100\">

                <svg xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" fill=\"#ffffff\" viewBox=\"0 0 256 256\"><path d=\"M176,120v72H80V120Z\" opacity=\"0.2\"></path><path d=\"M213.66,82.34l-56-56A8,8,0,0,0,152,24H56A16,16,0,0,0,40,40V216a16,16,0,0,0,16,16H200a16,16,0,0,0,16-16V88A8,8,0,0,0,213.66,82.34ZM200,216H56V40h92.69L200,91.31V216ZM176,112H80a8,8,0,0,0-8,8v72a8,8,0,0,0,8,8h96a8,8,0,0,0,8-8V120A8,8,0,0,0,176,112Zm-8,72H152V152a8,8,0,0,0-16,0v32H120V152a8,8,0,0,0-16,0v32H88V128h80Z\"></path></svg>
            <p class=\"font-medium text-zinc-50\">Sources</p>
        </a>

    </div>

</div>", "sidebar.html", "/var/www/templates/sidebar.html");
    }
}
