<?php

/* dashboard.twig */
class __TwigTemplate_a294450594a84d91700ed93585aeb0332972c01f723ca2244498a51301a4ab82 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("layout.twig", "dashboard.twig", 1);
        $this->blocks = array(
            'head' => array($this, 'block_head'),
            'pageDescription' => array($this, 'block_pageDescription'),
            'body' => array($this, 'block_body'),
            'root' => array($this, 'block_root'),
            'topcontrols' => array($this, 'block_topcontrols'),
            'notification' => array($this, 'block_notification'),
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "layout.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 11
        ob_start();
        echo ($context["siteName"] ?? $this->getContext($context, "siteName"));
        if (array_key_exists("prettyDateLong", $context)) {
            echo " - ";
            echo \Piwik\piwik_escape_filter($this->env, ($context["prettyDateLong"] ?? $this->getContext($context, "prettyDateLong")), "html", null, true);
        }
        echo " - ";
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("CoreHome_WebAnalyticsReports")), "html", null, true);
        $context["title"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 15
        $context["bodyClass"] = call_user_func_array($this->env->getFunction('postEvent')->getCallable(), array("Template.bodyClass", "dashboard"));
        // line 1
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_head($context, array $blocks = array())
    {
        // line 4
        echo "    ";
        $this->displayParentBlock("head", $context, $blocks);
        echo "

    <!--[if lt IE 9]>
    <script language=\"javascript\" type=\"text/javascript\" src=\"libs/jqplot/excanvas.min.js\"></script>
    <![endif]-->
";
    }

    // line 13
    public function block_pageDescription($context, array $blocks = array())
    {
        echo "Web Analytics report for ";
        echo \Piwik\piwik_escape_filter($this->env, ($context["siteName"] ?? $this->getContext($context, "siteName")), "html_attr");
        echo " - Piwik";
    }

    // line 17
    public function block_body($context, array $blocks = array())
    {
        // line 18
        echo "    ";
        $this->displayParentBlock("body", $context, $blocks);
        echo "
    ";
        // line 19
        echo call_user_func_array($this->env->getFunction('postEvent')->getCallable(), array("Template.footer"));
        echo "
";
    }

    // line 22
    public function block_root($context, array $blocks = array())
    {
        // line 23
        echo "    ";
        $this->loadTemplate("@CoreHome/_warningInvalidHost.twig", "dashboard.twig", 23)->display($context);
        // line 24
        echo "    ";
        $this->loadTemplate("@CoreHome/_topScreen.twig", "dashboard.twig", 24)->display($context);
        // line 25
        echo "
    <div class=\"top_controls\">
        <div piwik-quick-access ng-cloak class=\"piwikTopControl borderedControl\"></div>

        ";
        // line 29
        $this->displayBlock('topcontrols', $context, $blocks);
        // line 31
        echo "    </div>

    <div class=\"ui-confirm\" id=\"alert\">
        <h2></h2>
        <input role=\"yes\" type=\"button\" value=\"";
        // line 35
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Ok")), "html", null, true);
        echo "\"/>
    </div>

    ";
        // line 38
        echo call_user_func_array($this->env->getFunction('postEvent')->getCallable(), array("Template.beforeContent", "dashboard", ($context["currentModule"] ?? $this->getContext($context, "currentModule"))));
        echo "

    <div class=\"page\">

        ";
        // line 42
        if ((array_key_exists("showMenu", $context) && ($context["showMenu"] ?? $this->getContext($context, "showMenu")))) {
            // line 43
            echo "            <div id=\"secondNavBar\" class=\"Menu--dashboard z-depth-1\">
                <div piwik-reporting-menu></div>
            </div>
        ";
        }
        // line 47
        echo "
        <div class=\"pageWrap\" ng-cloak>

            <a name=\"main\"></a>
            ";
        // line 51
        $this->displayBlock('notification', $context, $blocks);
        // line 54
        echo "
            <div piwik-popover></div>

            ";
        // line 57
        $this->displayBlock('content', $context, $blocks);
        // line 59
        echo "
            <div class=\"clear\"></div>
        </div>

    </div>
";
    }

    // line 29
    public function block_topcontrols($context, array $blocks = array())
    {
        // line 30
        echo "        ";
    }

    // line 51
    public function block_notification($context, array $blocks = array())
    {
        // line 52
        echo "                ";
        $this->loadTemplate("@CoreHome/_notifications.twig", "dashboard.twig", 52)->display($context);
        // line 53
        echo "            ";
    }

    // line 57
    public function block_content($context, array $blocks = array())
    {
        // line 58
        echo "            ";
    }

    public function getTemplateName()
    {
        return "dashboard.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  171 => 58,  168 => 57,  164 => 53,  161 => 52,  158 => 51,  154 => 30,  151 => 29,  142 => 59,  140 => 57,  135 => 54,  133 => 51,  127 => 47,  121 => 43,  119 => 42,  112 => 38,  106 => 35,  100 => 31,  98 => 29,  92 => 25,  89 => 24,  86 => 23,  83 => 22,  77 => 19,  72 => 18,  69 => 17,  61 => 13,  50 => 4,  47 => 3,  43 => 1,  41 => 15,  31 => 11,  11 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends 'layout.twig' %}

{% block head %}
    {{ parent() }}

    <!--[if lt IE 9]>
    <script language=\"javascript\" type=\"text/javascript\" src=\"libs/jqplot/excanvas.min.js\"></script>
    <![endif]-->
{% endblock %}

{% set title %}{{ siteName|raw }}{% if prettyDateLong is defined %} - {{ prettyDateLong }}{% endif %} - {{ 'CoreHome_WebAnalyticsReports'|translate }}{% endset %}

{% block pageDescription %}Web Analytics report for {{ siteName|escape(\"html_attr\") }} - Piwik{% endblock %}

{% set bodyClass = postEvent('Template.bodyClass', 'dashboard') %}

{% block body %}
    {{ parent() }}
    {{ postEvent(\"Template.footer\") }}
{% endblock %}

{% block root %}
    {% include \"@CoreHome/_warningInvalidHost.twig\" %}
    {% include \"@CoreHome/_topScreen.twig\" %}

    <div class=\"top_controls\">
        <div piwik-quick-access ng-cloak class=\"piwikTopControl borderedControl\"></div>

        {% block topcontrols %}
        {% endblock %}
    </div>

    <div class=\"ui-confirm\" id=\"alert\">
        <h2></h2>
        <input role=\"yes\" type=\"button\" value=\"{{ 'General_Ok'|translate }}\"/>
    </div>

    {{ postEvent(\"Template.beforeContent\", \"dashboard\", currentModule) }}

    <div class=\"page\">

        {% if showMenu is defined and showMenu %}
            <div id=\"secondNavBar\" class=\"Menu--dashboard z-depth-1\">
                <div piwik-reporting-menu></div>
            </div>
        {% endif %}

        <div class=\"pageWrap\" ng-cloak>

            <a name=\"main\"></a>
            {% block notification %}
                {% include \"@CoreHome/_notifications.twig\" %}
            {% endblock %}

            <div piwik-popover></div>

            {% block content %}
            {% endblock %}

            <div class=\"clear\"></div>
        </div>

    </div>
{% endblock %}
", "dashboard.twig", "/var/www/html/analytics/plugins/Morpheus/templates/dashboard.twig");
    }
}
