<?php

/* @CoreHome/_headerMessage.twig */
class __TwigTemplate_b66913273b2467772ddff897753fb0a6a2742d4a59b9a27d3bebd75b9d5283b2 extends Twig_Template
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
        // line 2
        $context["test_latest_version_available"] = "4.0.0";
        // line 3
        $context["test_piwikUrl"] = "http://demo.piwik.org/";
        // line 4
        ob_start();
        echo \Piwik\piwik_escape_filter($this->env, ((($context["piwikUrl"] ?? $this->getContext($context, "piwikUrl")) == "http://demo.piwik.org/") || (($context["piwikUrl"] ?? $this->getContext($context, "piwikUrl")) == "https://demo.piwik.org/")), "html", null, true);
        $context["isPiwikDemo"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 5
        echo "
";
        // line 6
        ob_start();
        // line 7
        echo "    <span id=\"updateCheckLinkContainer\">
                ";
        // line 8
        echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("CoreHome_CheckForUpdates")), "html", null, true);
        echo "
        <span class=\"icon icon-fixed icon-reload\"></span>
    </span>
";
        $context["updateCheck"] = ('' === $tmp = ob_get_clean()) ? '' : new Twig_Markup($tmp, $this->env->getCharset());
        // line 12
        echo "
";
        // line 13
        if (((($context["isPiwikDemo"] ?? $this->getContext($context, "isPiwikDemo")) || ((($context["latest_version_available"] ?? $this->getContext($context, "latest_version_available")) && ($context["hasSomeViewAccess"] ?? $this->getContext($context, "hasSomeViewAccess"))) &&  !($context["isUserIsAnonymous"] ?? $this->getContext($context, "isUserIsAnonymous")))) || ((($context["isSuperUser"] ?? $this->getContext($context, "isSuperUser")) && array_key_exists("isAdminArea", $context)) && ($context["isAdminArea"] ?? $this->getContext($context, "isAdminArea"))))) {
            // line 14
            echo "<div piwik-expand-on-hover
     id=\"header_message\"
     class=\"piwikSelector borderedControl ";
            // line 16
            if ((($context["isPiwikDemo"] ?? $this->getContext($context, "isPiwikDemo")) ||  !($context["latest_version_available"] ?? $this->getContext($context, "latest_version_available")))) {
                echo "header_info";
            } else {
            }
            echo " ";
            if (($context["isPiwikDemo"] ?? $this->getContext($context, "isPiwikDemo"))) {
                echo "isPiwikDemo";
            } else {
                echo "piwikTopControl";
            }
            echo " ";
            if (($context["latest_version_available"] ?? $this->getContext($context, "latest_version_available"))) {
                echo "update_available";
            }
            echo "\"
        >

        ";
            // line 19
            if (($context["isPiwikDemo"] ?? $this->getContext($context, "isPiwikDemo"))) {
                // line 20
                echo "        <a class=\"title\" style=\"cursor:default;\">
            ";
                // line 21
                echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_YouAreViewingDemoShortMessage")), "html", null, true);
                echo "
          </a>
        ";
            } elseif (            // line 23
($context["latest_version_available"] ?? $this->getContext($context, "latest_version_available"))) {
                // line 24
                echo "        <a class=\"title\" href=\"?module=CoreUpdater&action=newVersionAvailable\" style=\"cursor:pointer;\">
            ";
                // line 25
                echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_NewUpdatePiwikX", ($context["latest_version_available"] ?? $this->getContext($context, "latest_version_available")))), "html", null, true);
                echo "
            <span class=\"icon-warning\"></span>
          </a>
        ";
            } elseif (((            // line 28
($context["isSuperUser"] ?? $this->getContext($context, "isSuperUser")) && array_key_exists("isAdminArea", $context)) && ($context["isAdminArea"] ?? $this->getContext($context, "isAdminArea")))) {
                // line 29
                echo "        <a class=\"title\">
            ";
                // line 30
                echo ($context["updateCheck"] ?? $this->getContext($context, "updateCheck"));
                echo "
          </a>
        ";
            }
            // line 33
            echo "
    <div class=\"dropdown positionInViewport\">
        ";
            // line 35
            if (($context["isPiwikDemo"] ?? $this->getContext($context, "isPiwikDemo"))) {
                // line 36
                echo "            ";
                echo call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_DownloadFullVersion", "<a rel='noreferrer' href='https://piwik.org/'>", "</a>", "<a rel='noreferrer' href='https://piwik.org'>piwik.org</a>"));
                echo "
            <br/>
            ";
                // line 38
                if (((($context["isSuperUser"] ?? $this->getContext($context, "isSuperUser")) && array_key_exists("isAdminArea", $context)) && ($context["isAdminArea"] ?? $this->getContext($context, "isAdminArea")))) {
                    // line 39
                    echo "                <br/>
            ";
                }
                // line 41
                echo "        ";
            }
            // line 42
            echo "        ";
            if ((($context["latest_version_available"] ?? $this->getContext($context, "latest_version_available")) && ($context["isSuperUser"] ?? $this->getContext($context, "isSuperUser")))) {
                // line 43
                echo "            ";
                if (($context["isMultiServerEnvironment"] ?? $this->getContext($context, "isMultiServerEnvironment"))) {
                    // line 44
                    echo "                ";
                    echo call_user_func_array($this->env->getFilter('translate')->getCallable(), array("CoreHome_OneClickUpdateNotPossibleAsMultiServerEnvironment", (("<a rel='noreferrer' href='https://builds.piwik.org/piwik-" . ($context["latest_version_available"] ?? $this->getContext($context, "latest_version_available"))) . ".zip'>"), "</a>"));
                    echo "
            ";
                } else {
                    // line 46
                    echo "                ";
                    echo call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_PiwikXIsAvailablePleaseUpdateNow", ($context["latest_version_available"] ?? $this->getContext($context, "latest_version_available")), "<br /><a href='index.php?module=CoreUpdater&amp;action=newVersionAvailable'>", "</a>", "<a href='?module=Proxy&amp;action=redirect&amp;url=http://piwik.org/changelog/' target='_blank'>", "</a>"));
                    echo "
            ";
                }
                // line 48
                echo "            <br />
        ";
            } elseif ((((            // line 49
($context["latest_version_available"] ?? $this->getContext($context, "latest_version_available")) &&  !($context["isPiwikDemo"] ?? $this->getContext($context, "isPiwikDemo"))) && ($context["hasSomeViewAccess"] ?? $this->getContext($context, "hasSomeViewAccess"))) &&  !($context["isUserIsAnonymous"] ?? $this->getContext($context, "isUserIsAnonymous")))) {
                // line 50
                echo "            ";
                $context["updateSubject"] = \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_NewUpdatePiwikX", ($context["latest_version_available"] ?? $this->getContext($context, "latest_version_available")))), "url");
                // line 51
                echo "            ";
                echo call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_PiwikXIsAvailablePleaseNotifyPiwikAdmin", (("<a href='?module=Proxy&action=redirect&url=http://piwik.org/' target='_blank'>Piwik</a> <a href='?module=Proxy&action=redirect&url=http://piwik.org/changelog/' target='_blank'>" . ($context["latest_version_available"] ?? $this->getContext($context, "latest_version_available"))) . "</a>"), (((("<a href='mailto:" . ($context["superUserEmails"] ?? $this->getContext($context, "superUserEmails"))) . "?subject=") . ($context["updateSubject"] ?? $this->getContext($context, "updateSubject"))) . "'>"), "</a>"));
                echo "
            <br />
        ";
            }
            // line 54
            echo "
        ";
            // line 55
            if ((((($context["isPiwikDemo"] ?? $this->getContext($context, "isPiwikDemo")) && ($context["isSuperUser"] ?? $this->getContext($context, "isSuperUser"))) && array_key_exists("isAdminArea", $context)) && ($context["isAdminArea"] ?? $this->getContext($context, "isAdminArea")))) {
                // line 56
                echo "            <br/>
            ";
                // line 57
                echo ($context["updateCheck"] ?? $this->getContext($context, "updateCheck"));
                echo "
            <br/>
            <br/>
        ";
            }
            // line 61
            echo "
        ";
            // line 62
            echo \Piwik\piwik_escape_filter($this->env, call_user_func_array($this->env->getFilter('translate')->getCallable(), array("General_YouAreCurrentlyUsing", ($context["piwik_version"] ?? $this->getContext($context, "piwik_version")))), "html", null, true);
            echo "
    </div>
</div>

<div style=\"clear:right\"></div>
";
        }
    }

    public function getTemplateName()
    {
        return "@CoreHome/_headerMessage.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  174 => 62,  171 => 61,  164 => 57,  161 => 56,  159 => 55,  156 => 54,  149 => 51,  146 => 50,  144 => 49,  141 => 48,  135 => 46,  129 => 44,  126 => 43,  123 => 42,  120 => 41,  116 => 39,  114 => 38,  108 => 36,  106 => 35,  102 => 33,  96 => 30,  93 => 29,  91 => 28,  85 => 25,  82 => 24,  80 => 23,  75 => 21,  72 => 20,  70 => 19,  51 => 16,  47 => 14,  45 => 13,  42 => 12,  35 => 8,  32 => 7,  30 => 6,  27 => 5,  23 => 4,  21 => 3,  19 => 2,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("{# testing, remove test_ from var names #}
{% set test_latest_version_available=\"4.0.0\" %}
{% set test_piwikUrl='http://demo.piwik.org/' %}
{% set isPiwikDemo %}{{ piwikUrl == 'http://demo.piwik.org/' or piwikUrl == 'https://demo.piwik.org/' }}{% endset %}

{% set updateCheck %}
    <span id=\"updateCheckLinkContainer\">
                {{ 'CoreHome_CheckForUpdates'|translate }}
        <span class=\"icon icon-fixed icon-reload\"></span>
    </span>
{% endset %}

{% if isPiwikDemo or (latest_version_available and hasSomeViewAccess and not isUserIsAnonymous) or (isSuperUser and isAdminArea is defined and isAdminArea) %}
<div piwik-expand-on-hover
     id=\"header_message\"
     class=\"piwikSelector borderedControl {% if isPiwikDemo or not latest_version_available %}header_info{% else %}{% endif %} {% if isPiwikDemo %}isPiwikDemo{% else %}piwikTopControl{% endif %} {% if latest_version_available %}update_available{% endif %}\"
        >

        {% if isPiwikDemo %}
        <a class=\"title\" style=\"cursor:default;\">
            {{ 'General_YouAreViewingDemoShortMessage'|translate }}
          </a>
        {% elseif latest_version_available %}
        <a class=\"title\" href=\"?module=CoreUpdater&action=newVersionAvailable\" style=\"cursor:pointer;\">
            {{ 'General_NewUpdatePiwikX'|translate(latest_version_available) }}
            <span class=\"icon-warning\"></span>
          </a>
        {% elseif isSuperUser and isAdminArea is defined and isAdminArea %}
        <a class=\"title\">
            {{ updateCheck|raw }}
          </a>
        {% endif %}

    <div class=\"dropdown positionInViewport\">
        {% if isPiwikDemo %}
            {{ 'General_DownloadFullVersion'|translate(\"<a rel='noreferrer' href='https://piwik.org/'>\",\"</a>\",\"<a rel='noreferrer' href='https://piwik.org'>piwik.org</a>\")|raw }}
            <br/>
            {% if isSuperUser and isAdminArea is defined and isAdminArea %}
                <br/>
            {% endif %}
        {% endif %}
        {% if latest_version_available and isSuperUser %}
            {% if isMultiServerEnvironment %}
                {{ 'CoreHome_OneClickUpdateNotPossibleAsMultiServerEnvironment'|translate(\"<a rel='noreferrer' href='https://builds.piwik.org/piwik-\" ~ latest_version_available ~ \".zip'>\",\"</a>\")|raw }}
            {% else %}
                {{ 'General_PiwikXIsAvailablePleaseUpdateNow'|translate(latest_version_available,\"<br /><a href='index.php?module=CoreUpdater&amp;action=newVersionAvailable'>\",\"</a>\",\"<a href='?module=Proxy&amp;action=redirect&amp;url=http://piwik.org/changelog/' target='_blank'>\",\"</a>\")|raw }}
            {% endif %}
            <br />
        {% elseif latest_version_available and not isPiwikDemo and hasSomeViewAccess and not isUserIsAnonymous %}
            {% set updateSubject = 'General_NewUpdatePiwikX'|translate(latest_version_available)|e('url') %}
            {{ 'General_PiwikXIsAvailablePleaseNotifyPiwikAdmin'|translate(\"<a href='?module=Proxy&action=redirect&url=http://piwik.org/' target='_blank'>Piwik</a> <a href='?module=Proxy&action=redirect&url=http://piwik.org/changelog/' target='_blank'>\" ~ latest_version_available ~ \"</a>\", \"<a href='mailto:\" ~ superUserEmails ~ \"?subject=\" ~ updateSubject ~ \"'>\", \"</a>\")|raw }}
            <br />
        {% endif %}

        {% if isPiwikDemo and isSuperUser and isAdminArea is defined and isAdminArea %}
            <br/>
            {{ updateCheck|raw }}
            <br/>
            <br/>
        {% endif %}

        {{ 'General_YouAreCurrentlyUsing'|translate(piwik_version) }}
    </div>
</div>

<div style=\"clear:right\"></div>
{% endif %}
", "@CoreHome/_headerMessage.twig", "/var/www/html/analytics/plugins/CoreHome/templates/_headerMessage.twig");
    }
}
