<?php

/* @MultiSites/getSitesInfo.twig */
class __TwigTemplate_f02d102e42421df0dcbb45788a30a8a917ef709bde87adc02993dc9a38eaddc1 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->blocks = array(
            'topcontrols' => array($this, 'block_topcontrols'),
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return $this->loadTemplate(((($context["isWidgetized"] ?? $this->getContext($context, "isWidgetized"))) ? ("empty.twig") : ("dashboard.twig")), "@MultiSites/getSitesInfo.twig", 1);
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->getParent($context)->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_topcontrols($context, array $blocks = array())
    {
        // line 4
        echo "    ";
        if ( !($context["isWidgetized"] ?? $this->getContext($context, "isWidgetized"))) {
            // line 5
            echo "        ";
            $this->loadTemplate("@CoreHome/_periodSelect.twig", "@MultiSites/getSitesInfo.twig", 5)->display($context);
            // line 6
            echo "        ";
            $this->loadTemplate("@CoreHome/_headerMessage.twig", "@MultiSites/getSitesInfo.twig", 6)->display($context);
            // line 7
            echo "    ";
        }
    }

    // line 10
    public function block_content($context, array $blocks = array())
    {
        // line 11
        echo "<div class=\"row\" id=\"multisites\">
    <div class=\"col s12 m12 l10 offset-l1\">
        ";
        // line 13
        if (($context["isWidgetized"] ?? $this->getContext($context, "isWidgetized"))) {
            // line 14
            echo "            <div id=\"main\">
        ";
        } else {
            // line 16
            echo "            <div id=\"main\" class=\"card\">
                <div class=\"card-content\">
        ";
        }
        // line 19
        echo "                <div piwik-multisites-dashboard
                     display-revenue-column=\"";
        // line 20
        if (($context["displayRevenueColumn"] ?? $this->getContext($context, "displayRevenueColumn"))) {
            echo "true";
        } else {
            echo "false";
        }
        echo "\"
                     page-size=\"";
        // line 21
        echo \Piwik\piwik_escape_filter($this->env, ($context["limit"] ?? $this->getContext($context, "limit")), "html", null, true);
        echo "\"
                     show-sparklines=\"";
        // line 22
        if (($context["show_sparklines"] ?? $this->getContext($context, "show_sparklines"))) {
            echo "true";
        } else {
            echo "false";
        }
        echo "\"
                     date-sparkline=\"";
        // line 23
        echo \Piwik\piwik_escape_filter($this->env, ($context["dateSparkline"] ?? $this->getContext($context, "dateSparkline")), "html", null, true);
        echo "\"
                     auto-refresh-today-report=\"";
        // line 24
        echo \Piwik\piwik_escape_filter($this->env, ($context["autoRefreshTodayReport"] ?? $this->getContext($context, "autoRefreshTodayReport")), "html", null, true);
        echo "\">
                </div>
        ";
        // line 26
        if (($context["isWidgetized"] ?? $this->getContext($context, "isWidgetized"))) {
            // line 27
            echo "            </div>
        ";
        } else {
            // line 29
            echo "            </div></div>
        ";
        }
        // line 31
        echo "    </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "@MultiSites/getSitesInfo.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  105 => 31,  101 => 29,  97 => 27,  95 => 26,  90 => 24,  86 => 23,  78 => 22,  74 => 21,  66 => 20,  63 => 19,  58 => 16,  54 => 14,  52 => 13,  48 => 11,  45 => 10,  40 => 7,  37 => 6,  34 => 5,  31 => 4,  28 => 3,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends isWidgetized ? 'empty.twig' : 'dashboard.twig' %}

{% block topcontrols %}
    {% if not isWidgetized %}
        {% include \"@CoreHome/_periodSelect.twig\" %}
        {% include \"@CoreHome/_headerMessage.twig\" %}
    {% endif %}
{% endblock %}

{% block content %}
<div class=\"row\" id=\"multisites\">
    <div class=\"col s12 m12 l10 offset-l1\">
        {% if isWidgetized %}
            <div id=\"main\">
        {% else %}
            <div id=\"main\" class=\"card\">
                <div class=\"card-content\">
        {% endif %}
                <div piwik-multisites-dashboard
                     display-revenue-column=\"{% if displayRevenueColumn %}true{% else %}false{%endif%}\"
                     page-size=\"{{ limit }}\"
                     show-sparklines=\"{% if show_sparklines %}true{% else %}false{%endif%}\"
                     date-sparkline=\"{{ dateSparkline }}\"
                     auto-refresh-today-report=\"{{ autoRefreshTodayReport }}\">
                </div>
        {% if isWidgetized %}
            </div>
        {% else %}
            </div></div>
        {% endif %}
    </div>
</div>
{% endblock %}
", "@MultiSites/getSitesInfo.twig", "/var/www/html/analytics/plugins/MultiSites/templates/getSitesInfo.twig");
    }
}
