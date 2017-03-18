<?php

/* @SitesManager/_displayJavascriptCode.twig */
class __TwigTemplate_f699e9380d7fc56ffad235a1e009afcf74b0898a21344c08c083b943396f84b2 extends Twig_Template
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
        echo "<h2>";
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("SitesManager_TrackingTags", ($context["displaySiteName"] ?? $this->getContext($context, "displaySiteName")))), "html", null, true);
        echo "</h2>

<div class='trackingHelp'>
    <p>";
        // line 4
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Installation_JSTracking_Intro")), "html", null, true);
        echo "</p>

    <p>";
        // line 6
        echo call_user_func_array($this->env->getFilter('translate')->getCallable(), array("CoreAdminHome_JSTrackingIntro3b", "<a href=\"http://piwik.org/integrate/\" rel=\"noreferrer\" target=\"_blank\">", "</a>"));
        echo "</p>

    <h3>";
        // line 8
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_JsTrackingTag")), "html", null, true);
        echo "</h3>

    <p>";
        // line 10
        echo call_user_func_array($this->env->getFilter('translate')->getCallable(), array("CoreAdminHome_JSTracking_CodeNoteBeforeClosingHead", "&lt;/head&gt;"));
        echo "</p>

    <pre piwik-select-on-focus>";
        // line 12
        echo ($context["jsTag"] ?? $this->getContext($context, "jsTag"));
        echo "</pre>

    <p>";
        // line 14
        echo call_user_func_array($this->env->getFilter('translate')->getCallable(), array("CoreAdminHome_JSTrackingIntro5", "<a rel=\"noreferrer\" target=\"_blank\" href=\"http://piwik.org/docs/javascript-tracking/\">", "</a>"));
        echo "</p>

    <p>";
        // line 16
        echo call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Installation_JSTracking_EndNote", "", ""));
        echo "</p>
</div>";
    }

    public function getTemplateName()
    {
        return "@SitesManager/_displayJavascriptCode.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  56 => 16,  51 => 14,  46 => 12,  41 => 10,  36 => 8,  31 => 6,  26 => 4,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("<h2>{{ 'SitesManager_TrackingTags'|translate(displaySiteName) }}</h2>

<div class='trackingHelp'>
    <p>{{ 'Installation_JSTracking_Intro'|translate }}</p>

    <p>{{ 'CoreAdminHome_JSTrackingIntro3b'|translate('<a href=\"http://piwik.org/integrate/\" rel=\"noreferrer\" target=\"_blank\">','</a>')|raw }}</p>

    <h3>{{ 'General_JsTrackingTag'|translate }}</h3>

    <p>{{ 'CoreAdminHome_JSTracking_CodeNoteBeforeClosingHead'|translate(\"&lt;/head&gt;\")|raw }}</p>

    <pre piwik-select-on-focus>{{ jsTag|raw }}</pre>

    <p>{{ 'CoreAdminHome_JSTrackingIntro5'|translate('<a rel=\"noreferrer\" target=\"_blank\" href=\"http://piwik.org/docs/javascript-tracking/\">','</a>')|raw }}</p>

    <p>{{ 'Installation_JSTracking_EndNote'|translate('','')|raw }}</p>
</div>", "@SitesManager/_displayJavascriptCode.twig", "/var/www/html/analytics/plugins/SitesManager/templates/_displayJavascriptCode.twig");
    }
}
