<?php

/* @ScheduledReports/index.twig */
class __TwigTemplate_3144b9d4dc2dc09a275561c83d126befbf5449ab374fcc6374276da767193b38 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("admin.twig", "@ScheduledReports/index.twig", 1);
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
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("ScheduledReports_PersonalEmailReports")), "html", null, true);
        $context["title"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 1
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 5
    public function block_topcontrols($context, array $blocks = array())
    {
        // line 6
        echo "    ";
        $this->loadTemplate("@CoreHome/_siteSelectHeader.twig", "@ScheduledReports/index.twig", 6)->display($context);
        // line 7
        echo "    ";
        $this->loadTemplate("@CoreHome/_periodSelect.twig", "@ScheduledReports/index.twig", 7)->display($context);
    }

    // line 10
    public function block_content($context, array $blocks = array())
    {
        // line 11
        echo "
<div class=\"emailReports\" piwik-manage-scheduled-report>

    <span id=\"reportSentSuccess\"></span>
    <span id=\"reportUpdatedSuccess\"></span>

    <div>
        ";
        // line 18
        $context["ajax"] = $this->loadTemplate("ajaxMacros.twig", "@ScheduledReports/index.twig", 18);
        // line 19
        echo "        ";
        echo $context["ajax"]->geterrorDiv();
        echo "
        ";
        // line 20
        echo $context["ajax"]->getloadingDiv();
        echo "
        ";
        // line 21
        $this->loadTemplate("@ScheduledReports/_listReports.twig", "@ScheduledReports/index.twig", 21)->display($context);
        // line 22
        echo "        ";
        $this->loadTemplate("@ScheduledReports/_addReport.twig", "@ScheduledReports/index.twig", 22)->display($context);
        // line 23
        echo "        <a id='bottom'></a>
    </div>
</div>

<div class=\"ui-confirm\" id=\"confirm\">
    <h2>";
        // line 28
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("ScheduledReports_AreYouSureDeleteReport")), "html", null, true);
        echo "</h2>
    <input role=\"yes\" type=\"button\" value=\"";
        // line 29
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Yes")), "html", null, true);
        echo "\"/>
    <input role=\"no\" type=\"button\" value=\"";
        // line 30
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_No")), "html", null, true);
        echo "\"/>
</div>

<script type=\"text/javascript\">
    var timeZoneDifference = ";
        // line 34
        echo \Piwik\piwik_escape_filter($this->env, ($context["timeZoneDifference"] ?? $this->getContext($context, "timeZoneDifference")), "html", null, true);
        echo ";
    var ReportPlugin = {};
    ReportPlugin.defaultPeriod = '";
        // line 36
        echo \Piwik\piwik_escape_filter($this->env, ($context["defaultPeriod"] ?? $this->getContext($context, "defaultPeriod")), "html", null, true);
        echo "';
    ReportPlugin.defaultHour = '";
        // line 37
        echo \Piwik\piwik_escape_filter($this->env, ($context["defaultHour"] ?? $this->getContext($context, "defaultHour")), "html", null, true);
        echo "';
    ReportPlugin.defaultReportType = '";
        // line 38
        echo \Piwik\piwik_escape_filter($this->env, ($context["defaultReportType"] ?? $this->getContext($context, "defaultReportType")), "html", null, true);
        echo "';
    ReportPlugin.defaultReportFormat = '";
        // line 39
        echo \Piwik\piwik_escape_filter($this->env, ($context["defaultReportFormat"] ?? $this->getContext($context, "defaultReportFormat")), "html", null, true);
        echo "';
    ReportPlugin.reportList = ";
        // line 40
        echo ($context["reportsJSON"] ?? $this->getContext($context, "reportsJSON"));
        echo ";
    ReportPlugin.createReportString = \"";
        // line 41
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("ScheduledReports_CreateReport")), "html", null, true);
        echo "\";
    ReportPlugin.updateReportString = \"";
        // line 42
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("ScheduledReports_UpdateReport")), "html", null, true);
        echo "\";
</script>
<style type=\"text/css\">
    .reportCategory {
        font-weight: bold;
        margin-bottom: 5px;
    }

    .entityAddContainer {
        position:relative;
    }

    .emailReports .top_controls {
        padding-bottom: 18px;
    }

</style>
";
    }

    public function getTemplateName()
    {
        return "@ScheduledReports/index.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  124 => 42,  120 => 41,  116 => 40,  112 => 39,  108 => 38,  104 => 37,  100 => 36,  95 => 34,  88 => 30,  84 => 29,  80 => 28,  73 => 23,  70 => 22,  68 => 21,  64 => 20,  59 => 19,  57 => 18,  48 => 11,  45 => 10,  40 => 7,  37 => 6,  34 => 5,  30 => 1,  26 => 3,  11 => 1,);
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

{% set title %}{{ 'ScheduledReports_PersonalEmailReports'|translate }}{% endset %}

{% block topcontrols %}
    {% include \"@CoreHome/_siteSelectHeader.twig\" %}
    {% include \"@CoreHome/_periodSelect.twig\" %}
{% endblock %}

{% block content %}

<div class=\"emailReports\" piwik-manage-scheduled-report>

    <span id=\"reportSentSuccess\"></span>
    <span id=\"reportUpdatedSuccess\"></span>

    <div>
        {% import 'ajaxMacros.twig' as ajax %}
        {{ ajax.errorDiv() }}
        {{ ajax.loadingDiv() }}
        {% include \"@ScheduledReports/_listReports.twig\" %}
        {% include \"@ScheduledReports/_addReport.twig\" %}
        <a id='bottom'></a>
    </div>
</div>

<div class=\"ui-confirm\" id=\"confirm\">
    <h2>{{ 'ScheduledReports_AreYouSureDeleteReport'|translate }}</h2>
    <input role=\"yes\" type=\"button\" value=\"{{ 'General_Yes'|translate }}\"/>
    <input role=\"no\" type=\"button\" value=\"{{ 'General_No'|translate }}\"/>
</div>

<script type=\"text/javascript\">
    var timeZoneDifference = {{ timeZoneDifference }};
    var ReportPlugin = {};
    ReportPlugin.defaultPeriod = '{{ defaultPeriod }}';
    ReportPlugin.defaultHour = '{{ defaultHour }}';
    ReportPlugin.defaultReportType = '{{ defaultReportType }}';
    ReportPlugin.defaultReportFormat = '{{ defaultReportFormat }}';
    ReportPlugin.reportList = {{ reportsJSON | raw }};
    ReportPlugin.createReportString = \"{{ 'ScheduledReports_CreateReport'|translate }}\";
    ReportPlugin.updateReportString = \"{{ 'ScheduledReports_UpdateReport'|translate }}\";
</script>
<style type=\"text/css\">
    .reportCategory {
        font-weight: bold;
        margin-bottom: 5px;
    }

    .entityAddContainer {
        position:relative;
    }

    .emailReports .top_controls {
        padding-bottom: 18px;
    }

</style>
{% endblock %}
", "@ScheduledReports/index.twig", "/var/www/html/analytics/plugins/ScheduledReports/templates/index.twig");
    }
}
