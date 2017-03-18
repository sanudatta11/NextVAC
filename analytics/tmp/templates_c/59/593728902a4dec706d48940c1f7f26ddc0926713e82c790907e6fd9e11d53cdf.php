<?php

/* @ScheduledReports/reportParametersScheduledReports.twig */
class __TwigTemplate_9a0a3b7f6b0cfa6989e0de8972a196135240ab6cc4561ae28d5fbc088faeb68c extends Twig_Template
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
        echo "<div piwik-field uicontrol=\"checkbox\"
     name=\"report_email_me\"
     introduction=\"";
        // line 3
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("ScheduledReports_SendReportTo")), "html_attr");
        echo "\"
     ng-show=\"manageScheduledReport.report.type == 'email'\"
     ng-model=\"manageScheduledReport.report.emailMe\"
     title=\"";
        // line 6
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("ScheduledReports_SentToMe")), "html_attr");
        echo " (";
        echo \Piwik\piwik_escape_filter($this->env, ($context["currentUserEmail"] ?? $this->getContext($context, "currentUserEmail")), "html_attr");
        echo ")\">
</div>

<div piwik-field uicontrol=\"textarea\" var-type=\"array\"
     ng-show=\"manageScheduledReport.report.type == 'email'\"
     ng-model=\"manageScheduledReport.report.additionalEmails\"
     title=\"";
        // line 12
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("ScheduledReports_AlsoSendReportToTheseEmails")), "html_attr");
        echo "\">
</div>

<script>

    \$(function () {

        resetReportParametersFunctions ['";
        // line 19
        echo \Piwik\piwik_escape_filter($this->env, ($context["reportType"] ?? $this->getContext($context, "reportType")), "html", null, true);
        echo "'] = function (report) {
            report.displayFormat = '";
        // line 20
        echo \Piwik\piwik_escape_filter($this->env, ($context["defaultDisplayFormat"] ?? $this->getContext($context, "defaultDisplayFormat")), "html", null, true);
        echo "';
            report.emailMe = ";
        // line 21
        echo \Piwik\piwik_escape_filter($this->env, ($context["defaultEmailMe"] ?? $this->getContext($context, "defaultEmailMe")), "html", null, true);
        echo ";
            report.evolutionGraph = ";
        // line 22
        echo \Piwik\piwik_escape_filter($this->env, ($context["defaultEvolutionGraph"] ?? $this->getContext($context, "defaultEvolutionGraph")), "html", null, true);
        echo ";
            report.additionalEmails = '';
        };

        updateReportParametersFunctions['";
        // line 26
        echo \Piwik\piwik_escape_filter($this->env, ($context["reportType"] ?? $this->getContext($context, "reportType")), "html", null, true);
        echo "'] = function (report) {
            if (report == null || report.parameters == null) {
                return;
            }

            var i, field, fields = ['displayFormat', 'emailMe', 'evolutionGraph', 'additionalEmails'];
            for (i in fields) {
                field = fields[i];
                if (report.parameters[field]) {
                    report[field] = report.parameters[field];
                }
            }
        };

        getReportParametersFunctions['";
        // line 40
        echo \Piwik\piwik_escape_filter($this->env, ($context["reportType"] ?? $this->getContext($context, "reportType")), "html", null, true);
        echo "'] = function (report) {

            var parameters = {};

            parameters.displayFormat = report.displayFormat;
            parameters.emailMe = report.emailMe;
            parameters.evolutionGraph = report.evolutionGraph;
            parameters.additionalEmails = report.additionalEmails ? report.additionalEmails : [];

            return parameters;
        };
    });
</script>";
    }

    public function getTemplateName()
    {
        return "@ScheduledReports/reportParametersScheduledReports.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  86 => 40,  69 => 26,  62 => 22,  58 => 21,  54 => 20,  50 => 19,  40 => 12,  29 => 6,  23 => 3,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("<div piwik-field uicontrol=\"checkbox\"
     name=\"report_email_me\"
     introduction=\"{{ 'ScheduledReports_SendReportTo'|translate|e('html_attr') }}\"
     ng-show=\"manageScheduledReport.report.type == 'email'\"
     ng-model=\"manageScheduledReport.report.emailMe\"
     title=\"{{ 'ScheduledReports_SentToMe'|translate|e('html_attr') }} ({{ currentUserEmail|e('html_attr') }})\">
</div>

<div piwik-field uicontrol=\"textarea\" var-type=\"array\"
     ng-show=\"manageScheduledReport.report.type == 'email'\"
     ng-model=\"manageScheduledReport.report.additionalEmails\"
     title=\"{{ 'ScheduledReports_AlsoSendReportToTheseEmails'|translate|e('html_attr') }}\">
</div>

<script>

    \$(function () {

        resetReportParametersFunctions ['{{ reportType }}'] = function (report) {
            report.displayFormat = '{{ defaultDisplayFormat }}';
            report.emailMe = {{ defaultEmailMe }};
            report.evolutionGraph = {{ defaultEvolutionGraph }};
            report.additionalEmails = '';
        };

        updateReportParametersFunctions['{{ reportType }}'] = function (report) {
            if (report == null || report.parameters == null) {
                return;
            }

            var i, field, fields = ['displayFormat', 'emailMe', 'evolutionGraph', 'additionalEmails'];
            for (i in fields) {
                field = fields[i];
                if (report.parameters[field]) {
                    report[field] = report.parameters[field];
                }
            }
        };

        getReportParametersFunctions['{{ reportType }}'] = function (report) {

            var parameters = {};

            parameters.displayFormat = report.displayFormat;
            parameters.emailMe = report.emailMe;
            parameters.evolutionGraph = report.evolutionGraph;
            parameters.additionalEmails = report.additionalEmails ? report.additionalEmails : [];

            return parameters;
        };
    });
</script>", "@ScheduledReports/reportParametersScheduledReports.twig", "/var/www/html/analytics/plugins/ScheduledReports/templates/reportParametersScheduledReports.twig");
    }
}
