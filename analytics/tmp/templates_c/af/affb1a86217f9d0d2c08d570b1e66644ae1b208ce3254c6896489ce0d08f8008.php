<?php

/* @UserCountryMap/realtimeMap.twig */
class __TwigTemplate_c977c7514e1ca3c6a29998f2cdbaee59789d043e99751fade849ec8a0ef0c6d0 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<div class=\"card\"><div class=\"RealTimeMap card-content\" style=\"position:relative; overflow:hidden;\"
     data-standalone=\"";
        // line 2
        echo \Piwik\piwik_escape_filter($this->env, ((array_key_exists("mapIsStandaloneNotWidget", $context)) ? (_twig_default_filter(($context["mapIsStandaloneNotWidget"] ?? $this->getContext($context, "mapIsStandaloneNotWidget")), 0)) : (0)), "html", null, true);
        echo "\"
     data-config=\"";
        // line 3
        echo \Piwik\piwik_escape_filter($this->env, twig_jsonencode_filter(($context["config"] ?? $this->getContext($context, "config"))), "html", null, true);
        echo "\"
     tabindex=\"0\">

    <div class=\"RealTimeMap_container\">
        <div class=\"RealTimeMap_map\" style=\"overflow:hidden;\"></div>
        <div class=\"realTimeMap_overlay\">
            ";
        // line 9
        if ((($this->getAttribute(($context["config"] ?? null), "showFooterMessage", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute(($context["config"] ?? null), "showFooterMessage", array()), true)) : (true))) {
            // line 10
            echo "            <span class=\"showing_visits_of\" style=\"display:none;\">";
            echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("UserCountryMap_ShowingVisits")), "html", null, true);
            echo "
                <span class=\"realTimeMap_timeSpan\" style=\"font-weight:bold;\"></span>
            </span>
            ";
        }
        // line 14
        echo "            <span class=\"no_data\" style=\"display:none;\">";
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("CoreHome_ThereIsNoDataForThisReport")), "html", null, true);
        echo "</span>
            <span class=\"loading_data\">";
        // line 15
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_LoadingData")), "html", null, true);
        echo "...</span>
            <img src=\"plugins/UserCountryMap/images/realtimemap-loading.gif\" style=\"vertical-align:baseline;position:relative;left:-2px;\">
        </div>
        ";
        // line 18
        if ((($this->getAttribute(($context["config"] ?? null), "showDateTime", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute(($context["config"] ?? null), "showDateTime", array()), true)) : (true))) {
            // line 19
            echo "        <div class=\"realTimeMap_overlay realTimeMap_datetime\"></div>
        ";
        }
        // line 21
        echo "    </div>
    <div class=\"RealTimeMap_meta\">
        <span class=\"loadingPiwik\">
            <img src=\"plugins/Morpheus/images/loading-blue.gif\"> ";
        // line 24
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_LoadingData")), "html", null, true);
        echo "...
        </span>
    </div>

</div>
</div>
<script type=\"text/javascript\">UserCountryMap.RealtimeMap.initElements();</script>";
    }

    public function getTemplateName()
    {
        return "@UserCountryMap/realtimeMap.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  67 => 24,  62 => 21,  58 => 19,  56 => 18,  50 => 15,  45 => 14,  37 => 10,  35 => 9,  26 => 3,  22 => 2,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("<div class=\"card\"><div class=\"RealTimeMap card-content\" style=\"position:relative; overflow:hidden;\"
     data-standalone=\"{{ mapIsStandaloneNotWidget|default(0) }}\"
     data-config=\"{{ config|json_encode }}\"
     tabindex=\"0\">

    <div class=\"RealTimeMap_container\">
        <div class=\"RealTimeMap_map\" style=\"overflow:hidden;\"></div>
        <div class=\"realTimeMap_overlay\">
            {% if config.showFooterMessage|default(true) %}
            <span class=\"showing_visits_of\" style=\"display:none;\">{{ 'UserCountryMap_ShowingVisits'|translate }}
                <span class=\"realTimeMap_timeSpan\" style=\"font-weight:bold;\"></span>
            </span>
            {% endif %}
            <span class=\"no_data\" style=\"display:none;\">{{ 'CoreHome_ThereIsNoDataForThisReport'|translate }}</span>
            <span class=\"loading_data\">{{ 'General_LoadingData'|translate }}...</span>
            <img src=\"plugins/UserCountryMap/images/realtimemap-loading.gif\" style=\"vertical-align:baseline;position:relative;left:-2px;\">
        </div>
        {% if config.showDateTime|default(true) %}
        <div class=\"realTimeMap_overlay realTimeMap_datetime\"></div>
        {% endif %}
    </div>
    <div class=\"RealTimeMap_meta\">
        <span class=\"loadingPiwik\">
            <img src=\"plugins/Morpheus/images/loading-blue.gif\"> {{ 'General_LoadingData'|translate }}...
        </span>
    </div>

</div>
</div>
<script type=\"text/javascript\">UserCountryMap.RealtimeMap.initElements();</script>", "@UserCountryMap/realtimeMap.twig", "/var/www/html/analytics/plugins/UserCountryMap/templates/realtimeMap.twig");
    }
}
