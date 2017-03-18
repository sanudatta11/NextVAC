<?php

/* @Goals/manageGoals.twig */
class __TwigTemplate_1a5acb09f95e67ad62f3c19ff170543d50eb7e7e08b17bfa517b858078983030 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("admin.twig", "@Goals/manageGoals.twig", 1);
        $this->blocks = array(
            'topcontrols' => array($this, 'block_topcontrols'),
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
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Goals_ManageGoals")), "html", null, true);
        $context["title"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 1
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 5
    public function block_topcontrols($context, array $blocks = array())
    {
        // line 6
        echo "    ";
        $this->loadTemplate("@CoreHome/_siteSelectHeader.twig", "@Goals/manageGoals.twig", 6)->display($context);
    }

    // line 9
    public function block_content($context, array $blocks = array())
    {
        // line 10
        echo "
    ";
        // line 11
        $this->loadTemplate("@Goals/_addEditGoal.twig", "@Goals/manageGoals.twig", 11)->display($context);
        // line 12
        echo "
    <style type=\"text/css\">
        .entityAddContainer {
            position:relative;
        }

        .entityAddContainer > .entityCancel:first-child {
            position: absolute;
            right:0;
            bottom:100%;
        }
    </style>
";
    }

    public function getTemplateName()
    {
        return "@Goals/manageGoals.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  50 => 12,  48 => 11,  45 => 10,  42 => 9,  37 => 6,  34 => 5,  30 => 1,  26 => 3,  11 => 1,);
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

{% set title %}{{ 'Goals_ManageGoals'|translate }}{% endset %}

{% block topcontrols %}
    {% include \"@CoreHome/_siteSelectHeader.twig\" %}
{% endblock %}

{% block content %}

    {% include \"@Goals/_addEditGoal.twig\" %}

    <style type=\"text/css\">
        .entityAddContainer {
            position:relative;
        }

        .entityAddContainer > .entityCancel:first-child {
            position: absolute;
            right:0;
            bottom:100%;
        }
    </style>
{% endblock %}
", "@Goals/manageGoals.twig", "/var/www/html/analytics/plugins/Goals/templates/manageGoals.twig");
    }
}
