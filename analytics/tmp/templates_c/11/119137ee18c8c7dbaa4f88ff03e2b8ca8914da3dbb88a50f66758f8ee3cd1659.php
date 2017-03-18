<?php

/* @Live/getSimpleLastVisitCount.twig */
class __TwigTemplate_0d0385082b7b2cae051c023ce973c349f5787b930491017a131431fb64e6bd7f extends Twig_Template
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
        echo "<div class='simple-realtime-visitor-widget' data-refreshAfterXSecs=\"";
        echo \Piwik\piwik_escape_filter($this->env, ($context["refreshAfterXSecs"] ?? $this->getContext($context, "refreshAfterXSecs")), "html", null, true);
        echo "\" data-last-minutes=\"";
        echo \Piwik\piwik_escape_filter($this->env, ($context["lastMinutes"] ?? $this->getContext($context, "lastMinutes")), "html", null, true);
        echo "\" data-translations=\"";
        echo \Piwik\piwik_escape_filter($this->env, twig_jsonencode_filter(($context["translations"] ?? $this->getContext($context, "translations"))), "html", null, true);
        echo "\">
    <div class='simple-realtime-visitor-counter' title=\"";
        // line 2
        if ((($context["visitors"] ?? $this->getContext($context, "visitors")) == 1)) {
            echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Live_NbVisitor")), "html", null, true);
        } else {
            echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Live_NbVisitors", ($context["visitors"] ?? $this->getContext($context, "visitors")))), "html", null, true);
        }
        echo "\">
        <div>";
        // line 3
        echo \Piwik\piwik_escape_filter($this->env, ($context["visitors"] ?? $this->getContext($context, "visitors")), "html", null, true);
        echo "</div>
    </div>
    <br/>

    <div class='simple-realtime-elaboration'>
        ";
        // line 8
        ob_start();
        // line 9
        echo "            <span class=\"simple-realtime-metric\" data-metric=\"visits\">";
        if ((($context["visits"] ?? $this->getContext($context, "visits")) == 1)) {
            echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_OneVisit")), "html", null, true);
        } else {
            echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_NVisits", ($context["visits"] ?? $this->getContext($context, "visits")))), "html", null, true);
        }
        echo "</span>
        ";
        $context["visitsMessage"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 11
        echo "        ";
        ob_start();
        // line 12
        echo "            <span class=\"simple-realtime-metric\" data-metric=\"actions\">";
        if ((($context["actions"] ?? $this->getContext($context, "actions")) == 1)) {
            echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_OneAction")), "html", null, true);
        } else {
            echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("VisitsSummary_NbActionsDescription", ($context["actions"] ?? $this->getContext($context, "actions")))), "html", null, true);
        }
        echo "</span>
        ";
        $context["actionsMessage"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 14
        echo "        ";
        ob_start();
        // line 15
        echo "            <span class=\"simple-realtime-metric\" data-metric=\"minutes\">";
        if ((($context["lastMinutes"] ?? $this->getContext($context, "lastMinutes")) == 1)) {
            echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Intl_OneMinute")), "html", null, true);
        } else {
            echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Intl_NMinutes", ($context["lastMinutes"] ?? $this->getContext($context, "lastMinutes")))), "html", null, true);
        }
        echo "</span>
        ";
        $context["minutesMessage"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 17
        echo "
        ";
        // line 18
        echo call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Live_SimpleRealTimeWidget_Message", ($context["visitsMessage"] ?? $this->getContext($context, "visitsMessage")), ($context["actionsMessage"] ?? $this->getContext($context, "actionsMessage")), ($context["minutesMessage"] ?? $this->getContext($context, "minutesMessage"))));
        echo "
    </div>
</div>
<script type=\"text/javascript\">\$(document).ready(function () {require('piwik/Live').initSimpleRealtimeVisitorWidget();});</script>";
    }

    public function getTemplateName()
    {
        return "@Live/getSimpleLastVisitCount.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  85 => 18,  82 => 17,  72 => 15,  69 => 14,  59 => 12,  56 => 11,  46 => 9,  44 => 8,  36 => 3,  28 => 2,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("<div class='simple-realtime-visitor-widget' data-refreshAfterXSecs=\"{{ refreshAfterXSecs }}\" data-last-minutes=\"{{ lastMinutes }}\" data-translations=\"{{ translations|json_encode }}\">
    <div class='simple-realtime-visitor-counter' title=\"{% if visitors == 1 %}{{ 'Live_NbVisitor'|translate }}{% else %}{{ 'Live_NbVisitors'|translate(visitors) }}{% endif %}\">
        <div>{{ visitors }}</div>
    </div>
    <br/>

    <div class='simple-realtime-elaboration'>
        {% set visitsMessage %}
            <span class=\"simple-realtime-metric\" data-metric=\"visits\">{% if visits == 1 %}{{ 'General_OneVisit'|translate }}{% else %}{{ 'General_NVisits'|translate(visits) }}{% endif %}</span>
        {% endset %}
        {% set actionsMessage %}
            <span class=\"simple-realtime-metric\" data-metric=\"actions\">{% if actions == 1 %}{{ 'General_OneAction'|translate }}{% else %}{{ 'VisitsSummary_NbActionsDescription'|translate(actions) }}{% endif %}</span>
        {% endset %}
        {% set minutesMessage %}
            <span class=\"simple-realtime-metric\" data-metric=\"minutes\">{% if lastMinutes == 1 %}{{ 'Intl_OneMinute'|translate }}{% else %}{{ 'Intl_NMinutes'|translate(lastMinutes) }}{% endif %}</span>
        {% endset %}

        {{ 'Live_SimpleRealTimeWidget_Message'|translate(visitsMessage,actionsMessage,minutesMessage) | raw }}
    </div>
</div>
<script type=\"text/javascript\">\$(document).ready(function () {require('piwik/Live').initSimpleRealtimeVisitorWidget();});</script>", "@Live/getSimpleLastVisitCount.twig", "/var/www/html/analytics/plugins/Live/templates/getSimpleLastVisitCount.twig");
    }
}
