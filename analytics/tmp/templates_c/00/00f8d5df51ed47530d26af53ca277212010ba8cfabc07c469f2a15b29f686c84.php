<?php

/* @Feedback/index.twig */
class __TwigTemplate_13589536a5e4cea2fddeb692e2e2313660ebeccdeea6b5dda6c99170a55b259d extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("dashboard.twig", "@Feedback/index.twig", 1);
        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "dashboard.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 3
        $context["test_piwikUrl"] = "http://demo.piwik.org/";
        // line 4
        ob_start();
        echo \Piwik\piwik_escape_filter($this->env, ((($context["piwikUrl"] ?? $this->getContext($context, "piwikUrl")) == "http://demo.piwik.org/") || (($context["piwikUrl"] ?? $this->getContext($context, "piwikUrl")) == "https://demo.piwik.org/")), "html", null, true);
        $context["isPiwikDemo"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 6
        ob_start();
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_AboutPiwikX", ($context["piwikVersion"] ?? $this->getContext($context, "piwikVersion")))), "html", null, true);
        $context["headline"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 1
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 8
    public function block_content($context, array $blocks = array())
    {
        // line 9
        echo "
    <div id=\"feedback-faq\" class=\"admin\">
        <div piwik-content-block
             content-title=\"";
        // line 12
        echo \Piwik\piwik_escape_filter($this->env, ($context["headline"] ?? $this->getContext($context, "headline")), "html_attr");
        echo "\"
             feature=\"";
        // line 13
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Help")), "html_attr");
        echo "\">
            <p>";
        // line 14
        echo call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_PiwikIsACollaborativeProjectYouCanContributeAndDonateNextRelease", "<a href='?module=Proxy&action=redirect&url=https://piwik.org' target='_blank'>", "</a>", "<a target='_blank' href='?module=Proxy&action=redirect&url=https://piwik.org/get-involved/'>", "</a>", "<a href='#donate'>", "</a>", "<a href='?module=Proxy&action=redirect&url=https://piwik.org/team/' target='_blank'>", "</a>"));
        // line 23
        echo "
            </p>
        </div>

        <div piwik-content-block content-title=\"";
        // line 27
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Feedback_CommunityHelp")), "html_attr");
        echo "\">
            <p> &bull; ";
        // line 28
        echo call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Feedback_ViewUserGuides", "<a target='_blank' href='?module=Proxy&action=redirect&url=https://piwik.org/docs/'>", "</a>"));
        echo ".</p>
            <p> &bull; ";
        // line 29
        echo call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Feedback_ViewAnswersToFAQ", "<a target='_blank' href='?module=Proxy&action=redirect&url=https://piwik.org/faq/'>", "</a>"));
        echo ".</p>
            <p> &bull; ";
        // line 30
        echo call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Feedback_VisitTheForums", "<a target='_blank' href='?module=Proxy&action=redirect&url=https://forum.piwik.org/'>", "</a>"));
        echo ".</p>
            <p> &bull; ";
        // line 31
        echo call_user_func_array($this->env->getFilter('translate')->getCallable(), array("API_LearnAboutCommonlyUsedTerms", (((("<a href=\"" . call_user_func_array($this->env->getFunction('linkTo')->getCallable(), array(array("module" => "API", "action" => "glossary")))) . "#metrics\">") . call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Metrics"))) . "</a>"), (((("<a href=\"" . call_user_func_array($this->env->getFunction('linkTo')->getCallable(), array(array("module" => "API", "action" => "glossary")))) . "#reports\">") . call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_Reports"))) . "</a>")));
        // line 34
        echo " (";
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("API_Glossary")), "html", null, true);
        echo ")</p>
        </div>

        <div piwik-content-block content-title=\"";
        // line 37
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Feedback_ProfessionalHelp")), "html_attr");
        echo "\">
            <p>";
        // line 38
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Feedback_ProfessionalServicesIntro")), "html", null, true);
        echo "</p>

            <p>";
        // line 40
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Feedback_ProfessionalServicesOfferIntro")), "html", null, true);
        echo "</p>
            <p> &bull; ";
        // line 41
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Feedback_ProfessionalServicesReviewPiwikSetup")), "html", null, true);
        echo "</p>
            <p> &bull; ";
        // line 42
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Feedback_ProfessionalServicesOptimizationMaintenance")), "html", null, true);
        echo "</p>
            <p> &bull; ";
        // line 43
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Feedback_ProfessionalServicesPhoneEmailSupport")), "html", null, true);
        echo "</p>
            <p> &bull; ";
        // line 44
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Feedback_ProfessionalServicesTraining")), "html", null, true);
        echo "</p>
            <p> &bull; <a  rel='noreferrer' target='_blank' href='https://piwik.org/recommends/premium-plugins'>";
        // line 45
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Feedback_ProfessionalServicesPremiumFeatures")), "html", null, true);
        echo "</a></p>
            <p> &bull; ";
        // line 46
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Feedback_ProfessionalServicesCustomDevelopment")), "html", null, true);
        echo "</p>
            <p> &bull; ";
        // line 47
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Feedback_ProfessionalServicesAnalystConsulting")), "html", null, true);
        echo "</p>

            <form target=\"_blank\" action=\"https://piwik.org/support/\">
                <input type=\"hidden\" name=\"pk_campaign\" value=\"App_Help\">
                <input type=\"hidden\" name=\"pk_source\" value=\"Piwik_App\">
                <input type=\"hidden\" name=\"pk_medium\" value=\"App_ContactUs_button\">
                <br />
                <input type=\"submit\" class=\"btn\" value=\"";
        // line 54
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Feedback_ContactUs")), "html", null, true);
        echo "\">
            </form>
        </div>

        <div piwik-content-block content-title=\"Premium products\">
            <p>Grow your business, understand your audience better and increase your sales and conversions with a premium plugin:
            <p> &bull;  <a rel='noreferrer' target='_blank' href='https://piwik.org/recommends/users-flow/'>Users Flow</a>: a visual representation of the most popular paths your users take through your website or app.</p>
            <p> &bull;  <a rel='noreferrer' target='_blank' href='https://piwik.org/recommends/ab-testing-learn-more/'>A/B Testing</a>: compare different versions of your websites or apps and detect the winning variation.</p>
            <p> &bull;  <a rel='noreferrer' target='_blank' href='https://piwik.org/recommends/conversion-funnels'>Funnels</a>: identify and understand where your visitors drop off in your conversion funnels.</p>
            <p> &bull;  <a rel='noreferrer' target='_blank' href='https://piwik.org/recommends/form-analytics/'>Form Analytics</a>: increase conversions and get better leads from your website forms.</p>
            <p> &bull;  <a rel='noreferrer' target='_blank' href='https://piwik.org/recommends/media-analytics-website/'>Video and Audio Analytics</a>: powerful insights into how your audience watches your videos and listens to your audio.</p>
            <p> &bull;  <a rel='noreferrer' target='_blank' href='https://piwik.org/recommends/roll-up-reporting/'>Roll-Up Reporting</a>: aggregate data from multiple websites, apps and shops into a Roll-Up site to gain new insights.</p>
            <p> &bull;  <a rel='noreferrer' target='_blank' href='https://piwik.org/recommends/activity-log/'>Audit log</a>: better security and problem diagnostic with a detailed audit log of Piwik user activities.</p>
            <p> &bull;  <a rel='noreferrer' target='_blank' href='https://piwik.org/recommends/white-label/'>White Label</a>: give your clients access to their analytics reports where all Piwik-branded widgets are removed.</p>
            <p> &bull;  <strong><a rel='noreferrer' target='_blank' href='https://piwik.org/recommends/premium-plugins'>All premium plugins.</a></strong></p>
        </div>

        <div piwik-content-block content-title=\"";
        // line 71
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Feedback_DoYouHaveBugReportOrFeatureRequest")), "html_attr");
        echo "\">
            <p>";
        // line 72
        echo call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Feedback_HowToCreateTicket", "<a target='_blank' href='?module=Proxy&action=redirect&url=https://developer.piwik.org/guides/core-team-workflow%23submitting-a-bug-report'>", "</a>", "<a target='_blank' href='?module=Proxy&action=redirect&url=https://developer.piwik.org/guides/core-team-workflow%23submitting-a-feature-request'>", "</a>", "<a target='_blank' href='?module=Proxy&action=redirect&url=https://github.com/piwik/piwik/issues'>", "</a>", "<a target='_blank' href='?module=Proxy&action=redirect&url=https://github.com/piwik/piwik/issues/new'>", "</a>"));
        // line 81
        echo "</p>
        </div>

        <div class=\"footer\">
            <ul class=\"social\">
                <li>
                    <a target=\"_blank\" href=\"?module=Proxy&action=redirect&url=https://piwik.org/newsletter/\"><img class=\"icon\" src=\"plugins/Feedback/images/newsletter.png\"></a>
                    <a target=\"_blank\" href=\"?module=Proxy&action=redirect&url=https://piwik.org/newsletter/\">Newsletter</a>
                </li>
                <li>
                    <a rel=\"noreferrer\"  target=\"_blank\" href=\"https://www.facebook.com/Piwik\"><img class=\"icon\" src=\"plugins/Feedback/images/facebook.png\"></a>
                    <a rel=\"noreferrer\"  target=\"_blank\" href=\"https://www.facebook.com/Piwik\">Facebook</a>
                </li>
                <li>
                    <a rel=\"noreferrer\"  target=\"_blank\" href=\"https://twitter.com/piwik\"><img class=\"icon\" src=\"plugins/Feedback/images/twitter.png\"></a>
                    <a rel=\"noreferrer\"  target=\"_blank\" href=\"https://twitter.com/piwik\">Twitter</a>
                </li>
                <li>
                    <a rel=\"noreferrer\"  target=\"_blank\" href=\"https://www.linkedin.com/groups?gid=867857\"><img class=\"icon\" src=\"plugins/Feedback/images/linkedin.png\"></a>
                    <a rel=\"noreferrer\"  target=\"_blank\" href=\"https://www.linkedin.com/groups?gid=867857\">Linkedin</a>
                </li>
                <li>
                    <a rel=\"noreferrer\"  target=\"_blank\" href=\"https://github.com/piwik/piwik\"><img class=\"icon\" src=\"plugins/Feedback/images/github.png\"></a>
                    <a rel=\"noreferrer\"  target=\"_blank\" href=\"https://github.com/piwik/piwik\">GitHub</a>
                </li>
            </ul>
            <ul class=\"menu\">
                <li><a target=\"_blank\" href=\"?module=Proxy&action=redirect&url=https://piwik.org/blog/\">Blog</a></li>
                <li><a target=\"_blank\" href=\"?module=Proxy&action=redirect&url=https://piwik.org/about/sponsors/\">Sponsors</a></li>
                <li><a target=\"_blank\" href=\"?module=Proxy&action=redirect&url=https://developer.piwik.org\">Developers</a></li>
                <li><a target=\"_blank\" href=\"?module=Proxy&action=redirect&url=https://plugins.piwik.org\">Marketplace</a></li>
                <li><a target=\"_blank\" href=\"?module=Proxy&action=redirect&url=https://piwik.org/thank-you-all/\">Credits</a></li>
            </ul>
            <p class=\"claim\"><small>";
        // line 114
        echo call_user_func_array($this->env->getFilter('translate')->getCallable(), array("Feedback_PrivacyClaim", "<a target='_blank' href='?module=Proxy&action=redirect&url=https://piwik.org/privacy/'>", "</a>"));
        // line 117
        echo "</small></p>
        </div>
    </div>
";
    }

    public function getTemplateName()
    {
        return "@Feedback/index.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  198 => 117,  196 => 114,  161 => 81,  159 => 72,  155 => 71,  135 => 54,  125 => 47,  121 => 46,  117 => 45,  113 => 44,  109 => 43,  105 => 42,  101 => 41,  97 => 40,  92 => 38,  88 => 37,  81 => 34,  79 => 31,  75 => 30,  71 => 29,  67 => 28,  63 => 27,  57 => 23,  55 => 14,  51 => 13,  47 => 12,  42 => 9,  39 => 8,  35 => 1,  31 => 6,  27 => 4,  25 => 3,  11 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends 'dashboard.twig' %}

{% set test_piwikUrl='http://demo.piwik.org/' %}
{% set isPiwikDemo %}{{ piwikUrl == 'http://demo.piwik.org/' or piwikUrl == 'https://demo.piwik.org/'}}{% endset %}

{% set headline %}{{ 'General_AboutPiwikX'|translate(piwikVersion) }}{% endset %}

{% block content %}

    <div id=\"feedback-faq\" class=\"admin\">
        <div piwik-content-block
             content-title=\"{{ headline|e('html_attr') }}\"
             feature=\"{{ 'General_Help'|translate|e('html_attr') }}\">
            <p>{{ 'General_PiwikIsACollaborativeProjectYouCanContributeAndDonateNextRelease'|translate(
                \"<a href='?module=Proxy&action=redirect&url=https://piwik.org' target='_blank'>\",
                \"</a>\",
                \"<a target='_blank' href='?module=Proxy&action=redirect&url=https://piwik.org/get-involved/'>\",
                \"</a>\",
                \"<a href='#donate'>\",
                \"</a>\",
                \"<a href='?module=Proxy&action=redirect&url=https://piwik.org/team/' target='_blank'>\",
                \"</a>\"
                )|raw }}
            </p>
        </div>

        <div piwik-content-block content-title=\"{{ 'Feedback_CommunityHelp'|translate|e('html_attr') }}\">
            <p> &bull; {{ 'Feedback_ViewUserGuides'|translate(\"<a target='_blank' href='?module=Proxy&action=redirect&url=https://piwik.org/docs/'>\",\"</a>\")|raw }}.</p>
            <p> &bull; {{ 'Feedback_ViewAnswersToFAQ'|translate(\"<a target='_blank' href='?module=Proxy&action=redirect&url=https://piwik.org/faq/'>\",\"</a>\")|raw }}.</p>
            <p> &bull; {{ 'Feedback_VisitTheForums'|translate(\"<a target='_blank' href='?module=Proxy&action=redirect&url=https://forum.piwik.org/'>\",\"</a>\")|raw }}.</p>
            <p> &bull; {{ 'API_LearnAboutCommonlyUsedTerms'|translate(
                '<a href=\"'~ linkTo({'module':\"API\",'action':\"glossary\"}) ~ '#metrics\">' ~ 'General_Metrics'|translate ~ '</a>',
                '<a href=\"'~ linkTo({'module':\"API\",'action':\"glossary\"}) ~ '#reports\">' ~ 'General_Reports'|translate ~ '</a>')|raw
                }} ({{ 'API_Glossary'|translate }})</p>
        </div>

        <div piwik-content-block content-title=\"{{ 'Feedback_ProfessionalHelp'|translate|e('html_attr') }}\">
            <p>{{ 'Feedback_ProfessionalServicesIntro'|translate }}</p>

            <p>{{ 'Feedback_ProfessionalServicesOfferIntro'|translate }}</p>
            <p> &bull; {{ 'Feedback_ProfessionalServicesReviewPiwikSetup'|translate }}</p>
            <p> &bull; {{ 'Feedback_ProfessionalServicesOptimizationMaintenance'|translate }}</p>
            <p> &bull; {{ 'Feedback_ProfessionalServicesPhoneEmailSupport'|translate }}</p>
            <p> &bull; {{ 'Feedback_ProfessionalServicesTraining'|translate }}</p>
            <p> &bull; <a  rel='noreferrer' target='_blank' href='https://piwik.org/recommends/premium-plugins'>{{ 'Feedback_ProfessionalServicesPremiumFeatures'|translate }}</a></p>
            <p> &bull; {{ 'Feedback_ProfessionalServicesCustomDevelopment'|translate }}</p>
            <p> &bull; {{ 'Feedback_ProfessionalServicesAnalystConsulting'|translate }}</p>

            <form target=\"_blank\" action=\"https://piwik.org/support/\">
                <input type=\"hidden\" name=\"pk_campaign\" value=\"App_Help\">
                <input type=\"hidden\" name=\"pk_source\" value=\"Piwik_App\">
                <input type=\"hidden\" name=\"pk_medium\" value=\"App_ContactUs_button\">
                <br />
                <input type=\"submit\" class=\"btn\" value=\"{{ 'Feedback_ContactUs'|translate }}\">
            </form>
        </div>

        <div piwik-content-block content-title=\"Premium products\">
            <p>Grow your business, understand your audience better and increase your sales and conversions with a premium plugin:
            <p> &bull;  <a rel='noreferrer' target='_blank' href='https://piwik.org/recommends/users-flow/'>Users Flow</a>: a visual representation of the most popular paths your users take through your website or app.</p>
            <p> &bull;  <a rel='noreferrer' target='_blank' href='https://piwik.org/recommends/ab-testing-learn-more/'>A/B Testing</a>: compare different versions of your websites or apps and detect the winning variation.</p>
            <p> &bull;  <a rel='noreferrer' target='_blank' href='https://piwik.org/recommends/conversion-funnels'>Funnels</a>: identify and understand where your visitors drop off in your conversion funnels.</p>
            <p> &bull;  <a rel='noreferrer' target='_blank' href='https://piwik.org/recommends/form-analytics/'>Form Analytics</a>: increase conversions and get better leads from your website forms.</p>
            <p> &bull;  <a rel='noreferrer' target='_blank' href='https://piwik.org/recommends/media-analytics-website/'>Video and Audio Analytics</a>: powerful insights into how your audience watches your videos and listens to your audio.</p>
            <p> &bull;  <a rel='noreferrer' target='_blank' href='https://piwik.org/recommends/roll-up-reporting/'>Roll-Up Reporting</a>: aggregate data from multiple websites, apps and shops into a Roll-Up site to gain new insights.</p>
            <p> &bull;  <a rel='noreferrer' target='_blank' href='https://piwik.org/recommends/activity-log/'>Audit log</a>: better security and problem diagnostic with a detailed audit log of Piwik user activities.</p>
            <p> &bull;  <a rel='noreferrer' target='_blank' href='https://piwik.org/recommends/white-label/'>White Label</a>: give your clients access to their analytics reports where all Piwik-branded widgets are removed.</p>
            <p> &bull;  <strong><a rel='noreferrer' target='_blank' href='https://piwik.org/recommends/premium-plugins'>All premium plugins.</a></strong></p>
        </div>

        <div piwik-content-block content-title=\"{{ 'Feedback_DoYouHaveBugReportOrFeatureRequest'|translate|e('html_attr') }}\">
            <p>{{ 'Feedback_HowToCreateTicket'|translate(
            \"<a target='_blank' href='?module=Proxy&action=redirect&url=https://developer.piwik.org/guides/core-team-workflow%23submitting-a-bug-report'>\",
            \"</a>\",
            \"<a target='_blank' href='?module=Proxy&action=redirect&url=https://developer.piwik.org/guides/core-team-workflow%23submitting-a-feature-request'>\",
            \"</a>\",
            \"<a target='_blank' href='?module=Proxy&action=redirect&url=https://github.com/piwik/piwik/issues'>\",
            \"</a>\",
            \"<a target='_blank' href='?module=Proxy&action=redirect&url=https://github.com/piwik/piwik/issues/new'>\",
            \"</a>\"
            )|raw }}</p>
        </div>

        <div class=\"footer\">
            <ul class=\"social\">
                <li>
                    <a target=\"_blank\" href=\"?module=Proxy&action=redirect&url=https://piwik.org/newsletter/\"><img class=\"icon\" src=\"plugins/Feedback/images/newsletter.png\"></a>
                    <a target=\"_blank\" href=\"?module=Proxy&action=redirect&url=https://piwik.org/newsletter/\">Newsletter</a>
                </li>
                <li>
                    <a rel=\"noreferrer\"  target=\"_blank\" href=\"https://www.facebook.com/Piwik\"><img class=\"icon\" src=\"plugins/Feedback/images/facebook.png\"></a>
                    <a rel=\"noreferrer\"  target=\"_blank\" href=\"https://www.facebook.com/Piwik\">Facebook</a>
                </li>
                <li>
                    <a rel=\"noreferrer\"  target=\"_blank\" href=\"https://twitter.com/piwik\"><img class=\"icon\" src=\"plugins/Feedback/images/twitter.png\"></a>
                    <a rel=\"noreferrer\"  target=\"_blank\" href=\"https://twitter.com/piwik\">Twitter</a>
                </li>
                <li>
                    <a rel=\"noreferrer\"  target=\"_blank\" href=\"https://www.linkedin.com/groups?gid=867857\"><img class=\"icon\" src=\"plugins/Feedback/images/linkedin.png\"></a>
                    <a rel=\"noreferrer\"  target=\"_blank\" href=\"https://www.linkedin.com/groups?gid=867857\">Linkedin</a>
                </li>
                <li>
                    <a rel=\"noreferrer\"  target=\"_blank\" href=\"https://github.com/piwik/piwik\"><img class=\"icon\" src=\"plugins/Feedback/images/github.png\"></a>
                    <a rel=\"noreferrer\"  target=\"_blank\" href=\"https://github.com/piwik/piwik\">GitHub</a>
                </li>
            </ul>
            <ul class=\"menu\">
                <li><a target=\"_blank\" href=\"?module=Proxy&action=redirect&url=https://piwik.org/blog/\">Blog</a></li>
                <li><a target=\"_blank\" href=\"?module=Proxy&action=redirect&url=https://piwik.org/about/sponsors/\">Sponsors</a></li>
                <li><a target=\"_blank\" href=\"?module=Proxy&action=redirect&url=https://developer.piwik.org\">Developers</a></li>
                <li><a target=\"_blank\" href=\"?module=Proxy&action=redirect&url=https://plugins.piwik.org\">Marketplace</a></li>
                <li><a target=\"_blank\" href=\"?module=Proxy&action=redirect&url=https://piwik.org/thank-you-all/\">Credits</a></li>
            </ul>
            <p class=\"claim\"><small>{{ 'Feedback_PrivacyClaim'|translate(
                    \"<a target='_blank' href='?module=Proxy&action=redirect&url=https://piwik.org/privacy/'>\",
                    \"</a>\"
                )|raw}}</small></p>
        </div>
    </div>
{% endblock %}
", "@Feedback/index.twig", "/var/www/html/analytics/plugins/Feedback/templates/index.twig");
    }
}
