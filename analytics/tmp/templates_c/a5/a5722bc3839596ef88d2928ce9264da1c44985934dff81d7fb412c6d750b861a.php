<?php

/* @MobileMessaging/macros.twig */
class __TwigTemplate_4db830aff921fe37acf2c4ad4c633034e8e64753c5e2e3401ff4491bdc6dc1d7 extends Twig_Template
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
        // line 57
        echo "
";
    }

    // line 1
    public function getmanageSmsApi($__credentialSupplied__ = null, $__credentialError__ = null, $__creditLeft__ = null, $__smsProviderOptions__ = null, $__smsProviders__ = null, $__provider__ = null, ...$__varargs__)
    {
        $context = $this->env->mergeGlobals(array(
            "credentialSupplied" => $__credentialSupplied__,
            "credentialError" => $__credentialError__,
            "creditLeft" => $__creditLeft__,
            "smsProviderOptions" => $__smsProviderOptions__,
            "smsProviders" => $__smsProviders__,
            "provider" => $__provider__,
            "varargs" => $__varargs__,
        ));

        $blocks = array();

        ob_start();
        try {
            // line 2
            echo "<div ng-controller=\"ManageSmsProviderController as manageProvider\">

    <div piwik-activity-indicator loading=\"manageProvider.isDeletingAccount\"></div>
    <div id=\"ajaxErrorManageSmsProviderSettings\"></div>

    ";
            // line 7
            if (($context["credentialSupplied"] ?? $this->getContext($context, "credentialSupplied"))) {
                // line 8
                echo "        <p>
            ";
                // line 9
                if (($context["credentialError"] ?? $this->getContext($context, "credentialError"))) {
                    // line 10
                    echo "                ";
                    echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("MobileMessaging_Settings_CredentialInvalid", ($context["provider"] ?? $this->getContext($context, "provider")))), "html", null, true);
                    echo "<br />
                ";
                    // line 11
                    echo \Piwik\piwik_escape_filter($this->env, ($context["credentialError"] ?? $this->getContext($context, "credentialError")), "html", null, true);
                    echo "
            ";
                } else {
                    // line 13
                    echo "                ";
                    echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("MobileMessaging_Settings_CredentialProvided", ($context["provider"] ?? $this->getContext($context, "provider")))), "html", null, true);
                    echo "
                ";
                    // line 14
                    echo \Piwik\piwik_escape_filter($this->env, ($context["creditLeft"] ?? $this->getContext($context, "creditLeft")), "html", null, true);
                    echo "
            ";
                }
                // line 16
                echo "            <br/>
            ";
                // line 17
                echo call_user_func_array($this->env->getFilter('translate')->getCallable(), array("MobileMessaging_Settings_UpdateOrDeleteAccount", "<a ng-click=\"manageProvider.showUpdateAccount()\" id=\"displayAccountForm\">", "</a>", "<a ng-click=\"manageProvider.deleteAccount()\" id=\"deleteAccount\">", "</a>"));
                echo "
        </p>
    ";
            } else {
                // line 20
                echo "        <p>";
                echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("MobileMessaging_Settings_PleaseSignUp")), "html", null, true);
                echo "</p>
    ";
            }
            // line 22
            echo "
    <div piwik-form id='accountForm' ";
            // line 23
            if (($context["credentialSupplied"] ?? $this->getContext($context, "credentialSupplied"))) {
                echo "ng-show=\"manageProvider.showAccountForm\"";
            }
            echo ">

        <div piwik-field uicontrol=\"select\" name=\"smsProviders\"
             options=\"";
            // line 26
            echo \Piwik\piwik_escape_filter($this->env, twig_jsonencode_filter(($context["smsProviderOptions"] ?? $this->getContext($context, "smsProviderOptions"))), "html", null, true);
            echo "\"
             ng-model=\"manageProvider.smsProvider\"
             ng-change=\"manageProvider.isUpdateAccountPossible()\"
             title=\"";
            // line 29
            echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("MobileMessaging_Settings_SMSProvider")), "html_attr");
            echo "\"
             value=\"";
            // line 30
            echo \Piwik\piwik_escape_filter($this->env, ($context["provider"] ?? $this->getContext($context, "provider")), "html", null, true);
            echo "\">
        </div>

        <div sms-provider-credentials
             provider=\"manageProvider.smsProvider\"
             ng-model=\"manageProvider.credentials\"
             value=\"{}\"
             ng-init=\"manageProvider.isUpdateAccountPossible()\"
             ng-change=\"manageProvider.isUpdateAccountPossible()\"
        ></div>

        <div piwik-save-button id='apiAccountSubmit'
             disabled=\"!manageProvider.canBeUpdated\"
             saving=\"manageProvider.isUpdatingAccount\"
             onconfirm=\"manageProvider.updateAccount()\"></div>

        ";
            // line 46
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["smsProviders"] ?? $this->getContext($context, "smsProviders")));
            foreach ($context['_seq'] as $context["smsProvider"] => $context["description"]) {
                // line 47
                echo "            <div class='providerDescription'
                 ng-show=\"manageProvider.smsProvider == '";
                // line 48
                echo \Piwik\piwik_escape_filter($this->env, \Piwik\piwik_escape_filter($this->env, $context["smsProvider"], "js"), "html", null, true);
                echo "'\"
                 id='";
                // line 49
                echo \Piwik\piwik_escape_filter($this->env, $context["smsProvider"], "html", null, true);
                echo "'>
                ";
                // line 50
                echo $context["description"];
                echo "
            </div>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['smsProvider'], $context['description'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 53
            echo "
    </div>
</div>
";
        } catch (Exception $e) {
            ob_end_clean();

            throw $e;
        } catch (Throwable $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
    }

    // line 58
    public function getselectPhoneNumbers($__phoneNumbers__ = null, $__angularContext__ = null, $__value__ = null, $__withIntroduction__ = null, ...$__varargs__)
    {
        $context = $this->env->mergeGlobals(array(
            "phoneNumbers" => $__phoneNumbers__,
            "angularContext" => $__angularContext__,
            "value" => $__value__,
            "withIntroduction" => $__withIntroduction__,
            "varargs" => $__varargs__,
        ));

        $blocks = array();

        ob_start();
        try {
            // line 59
            echo "    <div id=\"mobilePhoneNumbersHelp\" class=\"inline-help-node\">
        <span class=\"icon-info\"></span>

        ";
            // line 62
            if ((twig_length_filter($this->env, ($context["phoneNumbers"] ?? $this->getContext($context, "phoneNumbers"))) == 0)) {
                // line 63
                echo "            ";
                echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("MobileMessaging_MobileReport_NoPhoneNumbers")), "html", null, true);
                echo "
        ";
            } else {
                // line 65
                echo "            ";
                echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("MobileMessaging_MobileReport_AdditionalPhoneNumbers")), "html_attr");
                echo "
        ";
            }
            // line 67
            echo "        <a href=\"";
            echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFunction('linkTo')->getCallable(), array(array("module" => "MobileMessaging", "action" => "index", "updated" => null))), "html", null, true);
            echo "\">";
            echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("MobileMessaging_MobileReport_MobileMessagingSettingsLink")), "html", null, true);
            echo "</a>
    </div>

    <div class='mobile'
         piwik-field uicontrol=\"checkbox\"
         var-type=\"array\"
         name=\"phoneNumbers\"
         ng-model=\"";
            // line 74
            echo \Piwik\piwik_escape_filter($this->env, ($context["angularContext"] ?? $this->getContext($context, "angularContext")), "html", null, true);
            echo ".report.phoneNumbers\"
         ";
            // line 75
            if (($context["withIntroduction"] ?? $this->getContext($context, "withIntroduction"))) {
                // line 76
                echo "             introduction=\"";
                echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("ScheduledReports_SendReportTo")), "html_attr");
                echo "\"
         ";
            }
            // line 78
            echo "         title=\"";
            echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("MobileMessaging_PhoneNumbers")), "html_attr");
            echo "\"
         ";
            // line 79
            if ((twig_length_filter($this->env, ($context["phoneNumbers"] ?? $this->getContext($context, "phoneNumbers"))) == 0)) {
                echo "disabled=\"true\"";
            }
            // line 80
            echo "         options=\"";
            echo \Piwik\piwik_escape_filter($this->env, twig_jsonencode_filter(($context["phoneNumbers"] ?? $this->getContext($context, "phoneNumbers"))), "html", null, true);
            echo "\"
         inline-help=\"#mobilePhoneNumbersHelp\"
         ";
            // line 82
            if (($context["value"] ?? $this->getContext($context, "value"))) {
                echo "value=\"";
                echo \Piwik\piwik_escape_filter($this->env, twig_jsonencode_filter(($context["value"] ?? $this->getContext($context, "value"))), "html", null, true);
                echo "\"";
            }
            echo ">
    </div>
";
        } catch (Exception $e) {
            ob_end_clean();

            throw $e;
        } catch (Throwable $e) {
            ob_end_clean();

            throw $e;
        }

        return ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
    }

    public function getTemplateName()
    {
        return "@MobileMessaging/macros.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  246 => 82,  240 => 80,  236 => 79,  231 => 78,  225 => 76,  223 => 75,  219 => 74,  206 => 67,  200 => 65,  194 => 63,  192 => 62,  187 => 59,  172 => 58,  154 => 53,  145 => 50,  141 => 49,  137 => 48,  134 => 47,  130 => 46,  111 => 30,  107 => 29,  101 => 26,  93 => 23,  90 => 22,  84 => 20,  78 => 17,  75 => 16,  70 => 14,  65 => 13,  60 => 11,  55 => 10,  53 => 9,  50 => 8,  48 => 7,  41 => 2,  24 => 1,  19 => 57,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% macro manageSmsApi(credentialSupplied, credentialError, creditLeft, smsProviderOptions, smsProviders, provider) %}
<div ng-controller=\"ManageSmsProviderController as manageProvider\">

    <div piwik-activity-indicator loading=\"manageProvider.isDeletingAccount\"></div>
    <div id=\"ajaxErrorManageSmsProviderSettings\"></div>

    {% if credentialSupplied %}
        <p>
            {% if credentialError %}
                {{ 'MobileMessaging_Settings_CredentialInvalid'|translate(provider) }}<br />
                {{ credentialError }}
            {% else %}
                {{ 'MobileMessaging_Settings_CredentialProvided'|translate(provider) }}
                {{ creditLeft }}
            {% endif %}
            <br/>
            {{ 'MobileMessaging_Settings_UpdateOrDeleteAccount'|translate('<a ng-click=\"manageProvider.showUpdateAccount()\" id=\"displayAccountForm\">',\"</a>\",'<a ng-click=\"manageProvider.deleteAccount()\" id=\"deleteAccount\">',\"</a>\")|raw }}
        </p>
    {% else %}
        <p>{{ 'MobileMessaging_Settings_PleaseSignUp'|translate }}</p>
    {% endif %}

    <div piwik-form id='accountForm' {% if credentialSupplied %}ng-show=\"manageProvider.showAccountForm\"{% endif %}>

        <div piwik-field uicontrol=\"select\" name=\"smsProviders\"
             options=\"{{ smsProviderOptions|json_encode }}\"
             ng-model=\"manageProvider.smsProvider\"
             ng-change=\"manageProvider.isUpdateAccountPossible()\"
             title=\"{{ 'MobileMessaging_Settings_SMSProvider'|translate|e('html_attr') }}\"
             value=\"{{ provider }}\">
        </div>

        <div sms-provider-credentials
             provider=\"manageProvider.smsProvider\"
             ng-model=\"manageProvider.credentials\"
             value=\"{}\"
             ng-init=\"manageProvider.isUpdateAccountPossible()\"
             ng-change=\"manageProvider.isUpdateAccountPossible()\"
        ></div>

        <div piwik-save-button id='apiAccountSubmit'
             disabled=\"!manageProvider.canBeUpdated\"
             saving=\"manageProvider.isUpdatingAccount\"
             onconfirm=\"manageProvider.updateAccount()\"></div>

        {% for smsProvider, description in smsProviders %}
            <div class='providerDescription'
                 ng-show=\"manageProvider.smsProvider == '{{ smsProvider|e('js') }}'\"
                 id='{{ smsProvider }}'>
                {{ description|raw }}
            </div>
        {% endfor %}

    </div>
</div>
{% endmacro %}

{% macro selectPhoneNumbers(phoneNumbers, angularContext, value, withIntroduction) %}
    <div id=\"mobilePhoneNumbersHelp\" class=\"inline-help-node\">
        <span class=\"icon-info\"></span>

        {% if phoneNumbers|length == 0 %}
            {{ 'MobileMessaging_MobileReport_NoPhoneNumbers'|translate }}
        {% else %}
            {{ 'MobileMessaging_MobileReport_AdditionalPhoneNumbers'|translate|e('html_attr') }}
        {% endif %}
        <a href=\"{{ linkTo({'module':\"MobileMessaging\", 'action': 'index', 'updated':null}) }}\">{{ 'MobileMessaging_MobileReport_MobileMessagingSettingsLink'|translate }}</a>
    </div>

    <div class='mobile'
         piwik-field uicontrol=\"checkbox\"
         var-type=\"array\"
         name=\"phoneNumbers\"
         ng-model=\"{{ angularContext }}.report.phoneNumbers\"
         {% if withIntroduction %}
             introduction=\"{{ 'ScheduledReports_SendReportTo'|translate|e('html_attr') }}\"
         {% endif %}
         title=\"{{ 'MobileMessaging_PhoneNumbers'|translate|e('html_attr') }}\"
         {% if phoneNumbers|length == 0 %}disabled=\"true\"{% endif %}
         options=\"{{ phoneNumbers|json_encode }}\"
         inline-help=\"#mobilePhoneNumbersHelp\"
         {% if value %}value=\"{{ value|json_encode }}\"{% endif %}>
    </div>
{% endmacro %}", "@MobileMessaging/macros.twig", "/var/www/html/analytics/plugins/MobileMessaging/templates/macros.twig");
    }
}
