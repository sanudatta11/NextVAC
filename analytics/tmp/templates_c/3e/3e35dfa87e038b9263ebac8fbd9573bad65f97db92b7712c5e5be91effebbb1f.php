<?php

/* @Installation/systemCheckPage.twig */
class __TwigTemplate_c443426dffe3f48eaefe3ac5416a49febe120a69caf5207e128e01ffd69a7994 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("admin.twig", "@Installation/systemCheckPage.twig", 1);
        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "admin.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 3
        ob_start();
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Installation_SystemCheck")), "html", null, true);
        $context["title"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 1
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 5
    public function block_content($context, array $blocks = array())
    {
        // line 6
        echo "
    <div piwik-content-block content-title=\"";
        // line 7
        echo \Piwik\piwik_escape_filter($this->env, ($context["title"] ?? $this->getContext($context, "title")), "html_attr");
        echo "\" feature=\"true\">

        ";
        // line 9
        if ($this->getAttribute(($context["diagnosticReport"] ?? $this->getContext($context, "diagnosticReport")), "hasErrors", array(), "method")) {
            // line 10
            echo "            <div class=\"alert alert-danger\">
                ";
            // line 11
            echo call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Installation_SystemCheckSummaryThereWereErrors", "<strong>", "</strong>", "<strong>", "</strong>"));
            echo "
                ";
            // line 12
            echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Installation_SeeBelowForMoreInfo")), "html", null, true);
            echo "
            </div>
        ";
        } elseif ($this->getAttribute(        // line 14
($context["diagnosticReport"] ?? $this->getContext($context, "diagnosticReport")), "hasWarnings", array(), "method")) {
            // line 15
            echo "            <div class=\"alert alert-warning\">
                ";
            // line 16
            echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Installation_SystemCheckSummaryThereWereWarnings")), "html", null, true);
            echo "
                ";
            // line 17
            echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Installation_SeeBelowForMoreInfo")), "html", null, true);
            echo "
            </div>
        ";
        } else {
            // line 20
            echo "            <div class=\"alert alert-success\">
                ";
            // line 21
            echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Installation_SystemCheckSummaryNoProblems")), "html", null, true);
            echo "
            </div>
        ";
        }
        // line 24
        echo "
            ";
        // line 25
        $this->loadTemplate("@Installation/_systemCheckSection.twig", "@Installation/systemCheckPage.twig", 25)->display($context);
        // line 26
        echo "    </div>


";
    }

    public function getTemplateName()
    {
        return "@Installation/systemCheckPage.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  87 => 26,  85 => 25,  82 => 24,  76 => 21,  73 => 20,  67 => 17,  63 => 16,  60 => 15,  58 => 14,  53 => 12,  49 => 11,  46 => 10,  44 => 9,  39 => 7,  36 => 6,  33 => 5,  29 => 1,  25 => 3,  11 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends 'admin.twig' %}

{% set title %}{{ 'Installation_SystemCheck'|translate }}{% endset %}

{% block content %}

    <div piwik-content-block content-title=\"{{ title|e('html_attr') }}\" feature=\"true\">

        {% if diagnosticReport.hasErrors() %}
            <div class=\"alert alert-danger\">
                {{ 'Installation_SystemCheckSummaryThereWereErrors'|translate('<strong>','</strong>','<strong>','</strong>')|raw }}
                {{ 'Installation_SeeBelowForMoreInfo'|translate }}
            </div>
        {% elseif diagnosticReport.hasWarnings() %}
            <div class=\"alert alert-warning\">
                {{ 'Installation_SystemCheckSummaryThereWereWarnings'|translate }}
                {{ 'Installation_SeeBelowForMoreInfo'|translate }}
            </div>
        {% else %}
            <div class=\"alert alert-success\">
                {{ 'Installation_SystemCheckSummaryNoProblems'|translate }}
            </div>
        {% endif %}

            {% include \"@Installation/_systemCheckSection.twig\" %}
    </div>


{% endblock %}
", "@Installation/systemCheckPage.twig", "/var/www/html/analytics/plugins/Installation/templates/systemCheckPage.twig");
    }
}
