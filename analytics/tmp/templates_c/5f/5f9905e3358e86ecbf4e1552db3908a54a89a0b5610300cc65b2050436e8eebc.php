<?php

/* @MobileMessaging/reportParametersScheduledReports.twig */
class __TwigTemplate_cb4ec3dbcb3a392ea20d6a0d14568653997c54d29c86c8e1abd9cd8495835271 extends Twig_Template
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
        $context["macro"] = $this->loadTemplate("@MobileMessaging/macros.twig", "@MobileMessaging/reportParametersScheduledReports.twig", 1);
        // line 2
        echo "
<div ng-show=\"manageScheduledReport.report.type == 'mobile'\">
    ";
        // line 4
        echo $context["macro"]->getselectPhoneNumbers(($context["phoneNumbers"] ?? $this->getContext($context, "phoneNumbers")), "manageScheduledReport", "", true);
        echo "
</div>

<script>
\$(function () {
    resetReportParametersFunctions['mobile'] = function (report) {
        report.phoneNumbers = [];
        report.formatmobile = 'sms';
    };

    updateReportParametersFunctions['mobile'] = function (report) {
        if (report.parameters && report.parameters.phoneNumbers) {
            report.phoneNumbers = report.parameters.phoneNumbers;
        }
        report.formatmobile = 'sms';
    };

    getReportParametersFunctions['mobile'] = function (report) {
        var parameters = {};

        // returning [''] when no phone numbers are selected avoids the \"please provide a value for 'parameters'\" error message
        parameters.phoneNumbers = report.phoneNumbers && report.phoneNumbers.length > 0 ? report.phoneNumbers : [''];

        return parameters;
    };
});
</script>";
    }

    public function getTemplateName()
    {
        return "@MobileMessaging/reportParametersScheduledReports.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  25 => 4,  21 => 2,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% import '@MobileMessaging/macros.twig' as macro %}

<div ng-show=\"manageScheduledReport.report.type == 'mobile'\">
    {{ macro.selectPhoneNumbers(phoneNumbers, 'manageScheduledReport', '', true) }}
</div>

<script>
\$(function () {
    resetReportParametersFunctions['mobile'] = function (report) {
        report.phoneNumbers = [];
        report.formatmobile = 'sms';
    };

    updateReportParametersFunctions['mobile'] = function (report) {
        if (report.parameters && report.parameters.phoneNumbers) {
            report.phoneNumbers = report.parameters.phoneNumbers;
        }
        report.formatmobile = 'sms';
    };

    getReportParametersFunctions['mobile'] = function (report) {
        var parameters = {};

        // returning [''] when no phone numbers are selected avoids the \"please provide a value for 'parameters'\" error message
        parameters.phoneNumbers = report.phoneNumbers && report.phoneNumbers.length > 0 ? report.phoneNumbers : [''];

        return parameters;
    };
});
</script>", "@MobileMessaging/reportParametersScheduledReports.twig", "/var/www/html/analytics/plugins/MobileMessaging/templates/reportParametersScheduledReports.twig");
    }
}
