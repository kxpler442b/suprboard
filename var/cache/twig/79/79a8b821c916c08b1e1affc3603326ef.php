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

/* topbar.html */
class __TwigTemplate_69ea43a68cbeb134cd64e21cfa595ae4 extends Template
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
    row-start-1 row-end-2 col-start-3 col-end-13
    flex flex-col justify-start align-middle items-center
    w-full h-full
    border-b border-zinc-950/30\">

    <div class=\"
        flex-grow flex flex-row justify-start align-middle items-center space-x-4
        h-full w-full px-8 py-4\">

        <h1 class=\"font-title font-bold text-3xl text-zinc-950\">";
        // line 11
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "context", [], "any", false, false, false, 11), "html", null, true);
        echo "</h1>
    
    </div>

    <div class=\"
        flex flex-row justify-start align-middle items-center space-x-4
        w-full h-fit
        border-t border-zinc-950/30
        bg-zinc-100\">

        <a
            href=\"#\"
            class=\"
                inline-flex flex-row justify-center align-middle items-center space-x-4
                w-fit h-full px-4 py-2
                hover:bg-zinc-300
                transition-all ease-in-out duration-100\">

            <p class=\"font-medium text-sm text-zinc-950\">Test Breadcrumb</p>
        </a>

        <svg xmlns=\"http://www.w3.org/2000/svg\" width=\"20\" height=\"20\" fill=\"#09090b\" viewBox=\"0 0 256 256\"><path d=\"M181.66,133.66l-80,80a8,8,0,0,1-11.32-11.32L164.69,128,90.34,53.66a8,8,0,0,1,11.32-11.32l80,80A8,8,0,0,1,181.66,133.66Z\"></path></svg>

        <a
            href=\"#\"
            class=\"
                inline-flex flex-row justify-center align-middle items-center space-x-4
                w-fit h-full px-4 py-2
                hover:bg-zinc-300
                transition-all ease-in-out duration-100\">

            <svg xmlns=\"http://www.w3.org/2000/svg\" width=\"20\" height=\"20\" fill=\"#09090b\" viewBox=\"0 0 256 256\"><path d=\"M178.16,184H111.32A48,48,0,1,1,25.6,147.19a8,8,0,0,1,12.8,9.61A31.69,31.69,0,0,0,32,176a32,32,0,0,0,64,0,8,8,0,0,1,8-8h74.16a16,16,0,1,1,0,16ZM64,192a16,16,0,0,0,14.08-23.61l35.77-58.14a8,8,0,0,0-2.62-11,32,32,0,1,1,46.1-40.06A8,8,0,1,0,172,52.79a48,48,0,1,0-75.62,55.33L64.44,160c-.15,0-.29,0-.44,0a16,16,0,0,0,0,32Zm128-64a48.18,48.18,0,0,0-18,3.49L142.08,79.6A16,16,0,1,0,128,88l.44,0,35.78,58.15a8,8,0,0,0,11,2.61A32,32,0,1,1,192,208a8,8,0,0,0,0,16,48,48,0,0,0,0-96Z\"></path></svg>
            <p class=\"font-medium text-sm text-zinc-950\">Test App Breadcrumb</p>
        </a>
    
    </div>

</div>";
    }

    public function getTemplateName()
    {
        return "topbar.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  49 => 11,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<div class=\"
    row-start-1 row-end-2 col-start-3 col-end-13
    flex flex-col justify-start align-middle items-center
    w-full h-full
    border-b border-zinc-950/30\">

    <div class=\"
        flex-grow flex flex-row justify-start align-middle items-center space-x-4
        h-full w-full px-8 py-4\">

        <h1 class=\"font-title font-bold text-3xl text-zinc-950\">{{ page.context }}</h1>
    
    </div>

    <div class=\"
        flex flex-row justify-start align-middle items-center space-x-4
        w-full h-fit
        border-t border-zinc-950/30
        bg-zinc-100\">

        <a
            href=\"#\"
            class=\"
                inline-flex flex-row justify-center align-middle items-center space-x-4
                w-fit h-full px-4 py-2
                hover:bg-zinc-300
                transition-all ease-in-out duration-100\">

            <p class=\"font-medium text-sm text-zinc-950\">Test Breadcrumb</p>
        </a>

        <svg xmlns=\"http://www.w3.org/2000/svg\" width=\"20\" height=\"20\" fill=\"#09090b\" viewBox=\"0 0 256 256\"><path d=\"M181.66,133.66l-80,80a8,8,0,0,1-11.32-11.32L164.69,128,90.34,53.66a8,8,0,0,1,11.32-11.32l80,80A8,8,0,0,1,181.66,133.66Z\"></path></svg>

        <a
            href=\"#\"
            class=\"
                inline-flex flex-row justify-center align-middle items-center space-x-4
                w-fit h-full px-4 py-2
                hover:bg-zinc-300
                transition-all ease-in-out duration-100\">

            <svg xmlns=\"http://www.w3.org/2000/svg\" width=\"20\" height=\"20\" fill=\"#09090b\" viewBox=\"0 0 256 256\"><path d=\"M178.16,184H111.32A48,48,0,1,1,25.6,147.19a8,8,0,0,1,12.8,9.61A31.69,31.69,0,0,0,32,176a32,32,0,0,0,64,0,8,8,0,0,1,8-8h74.16a16,16,0,1,1,0,16ZM64,192a16,16,0,0,0,14.08-23.61l35.77-58.14a8,8,0,0,0-2.62-11,32,32,0,1,1,46.1-40.06A8,8,0,1,0,172,52.79a48,48,0,1,0-75.62,55.33L64.44,160c-.15,0-.29,0-.44,0a16,16,0,0,0,0,32Zm128-64a48.18,48.18,0,0,0-18,3.49L142.08,79.6A16,16,0,1,0,128,88l.44,0,35.78,58.15a8,8,0,0,0,11,2.61A32,32,0,1,1,192,208a8,8,0,0,0,0,16,48,48,0,0,0,0-96Z\"></path></svg>
            <p class=\"font-medium text-sm text-zinc-950\">Test App Breadcrumb</p>
        </a>
    
    </div>

</div>", "topbar.html", "/var/www/templates/topbar.html");
    }
}
