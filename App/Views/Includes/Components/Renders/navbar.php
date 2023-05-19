<?php
use Models\Core\App\Database\Queries\Read\Client as ReadClient;
use Models\Core\App\Database\Queries\Read\Staff as ReadStaff;
use Models\Core\App\Utilities\Session;
use Models\Core\App\Utilities\Url;
use Views\Includes\Components\Classes\Navbar;

function navbarSetUpDefaults(Navbar $navbar)
{
    $navbar->setIsCollapsable(true);
    $navbar->setNavBarVariation("light");
    $navbar->setNavBarColor("light");
    $navbar->setNavBarClasses("p-3 p-md-0 shadow-sm");
    $navbar->setNavBarPositioning("fixed-top");
    $navbar->setNavBrandClasses("mx-2 mt-2");
    $navbar->setNavBrandLink("home");
    $navbar->setNavBrandImageUrl(Url::getReference("resources/assets/icons/luxurybnbslogo.png"));
    $navbar->setNavBrandImageClasses("luxury-bnb__logo");
    $navbar->setNavItemClasses("mx-3");
}

function runClientNavbarSetUp(string $page)
{
    $navbar = new Navbar;
    $navbar->setCurrentPage($page);
    navbarSetUpDefaults($navbar);
    if (Session::exists("cl_username")) {
        $client = new ReadClient;
        $profile = "Hi " . $client->getClientFirstname(Session::get("cl_username"));
        $navbar->setNavItems([
            "Home",
            "About",
            "Rooms",
            "Pricing",
            $profile,
        ]);
        $navbar->setNavLinks([
            "Home" => "home",
            "About" => "#",
            "Rooms" => "#",
            "Pricing" => "#",
            $profile => "#",
        ]);
        $navbar->setDropDownItems([
            $profile => [
                "My bookings",
                "My payments",
                "My discounts",
                "Log out",
            ]
        ]);
        $navbar->setDropdownItemClasses([
            $profile => "left-3"
        ]);
        $navbar->setDropdownItemLinkClasses([
            "Log out" => "logout"
        ]);
        $navbar->setDropDownItemsId([
            $profile => "profile"
        ]);
        $navbar->setDropDownItemLinks([
            $profile => [
                "My bookings" => "client-bookings",
                "My payments" => "client-payments",
                "My discounts" => "client-discounts",
                "Log out" => "#",
            ]
        ]);
        $navbar->setNavItemIcons([
            "My bookings" => Url::getReference("resources/assets/images/png/phone.png"),
            "My payments" => Url::getReference("resources/assets/images/png/dollar.png"),
            "My discounts" => Url::getReference("resources/assets/images/png/payment-method.png"),
            "Log out" => Url::getReference("resources/assets/images/png/shutdown.png")
        ]);
        $openClasses = "me-1 mb-1 md-small";
        $navbar->setNavItemIconClasses([
            "My bookings" => $openClasses,
            "My payments" => $openClasses,
            "My discounts" => $openClasses,
            "Log out" => $openClasses,
        ]);
        $navbar->setSeparator(false);
        $navbar->setNavBarUlClasses("ms-auto mt-2 mt-lg-0 mx-4");
    } else {
        $navbar->setNavItems([
            "Home",
            "About",
            "Rooms",
            "Pricing",
            "Sign in",
        ]);
        $navbar->setNavLinks([
            "Home" => "home",
            "About" => "#",
            "Rooms" => "#",
            "Pricing" => "#",
            "Sign in" => "#"
        ]);
        $navbar->setDropDownItems([
            "Sign in" => [
                "Sign in as staff",
                "Sign in as client"
            ]
        ]);
        $navbar->setDropDownItemsId([
            "Sign in" => "sign-in",
        ]);
        $navbar->setDropDownItemLinks([
            "Sign in" => [
                "Sign in as staff" => "staff-login",
                "Sign in as client" => "client-login"
            ]
        ]);
        $navbar->setSeparator(true);
        $navbar->setSeparatorClasses("d-none d-md-block");
        $navbar->setNavBarButtons([
            "Register"
        ]);

        $navbar->setButtonLinks([
            "Register" => "client-registration"
        ]);
        $navbar->setButtonColor("primary");
        $navbar->setButtonClasses("rounded text-white");
        $navbar->setButtonContainerClasses("mx-3 mb-sm-3 mb-md-0");
        $navbar->setNavBarUlClasses("ms-auto mt-2 mt-lg-0");
    }

    $navbar->runSetup();
}

function runStaffNavbarSetUp(string $page)
{
    $navbar = new Navbar;
    $navbar->setCurrentPage($page);
    navbarSetUpDefaults($navbar);
    $staff = new ReadStaff;
    $profile = "Hi " . ucfirst($staff->getStaffFirstname(Session::get("st_username")));
    $navbar->setNavItems([
        "Home",
        "Rooms",
        "Bookings",
        "Payments",
        $profile,
    ]);
    $navbar->setNavLinks([
        "Home" => "staff-home",
        "Rooms" => "#",
        "Bookings" => "view-bookings",
        "Payments" => "view-payments",
        $profile => "#",
    ]);
    $navbar->setDropDownItems([
        "Rooms" => [
            "View rooms",
            "Add room",
        ],
        $profile => [
            "Log out"
        ]
    ]);
    $navbar->setDropDownItemsId([
        "Staff" => "staff",
        "Rooms" => "rooms",
        "Bookings" => "bookings",
        $profile => "profile"
    ]);
    $navbar->setDropDownItemLinks([
        "Rooms" => [
            "View rooms" => "view-rooms",
            "Add room" => "room-registration",
        ],
        $profile => [
            "Log out" => "#"
        ]
    ]);
    $navbar->setDropdownItemLinkClasses([
        "Log out" => "logout"
    ]);
    $open = Url::getReference("resources/assets/images/png/open-folder.png");
    $add = Url::getReference("resources/assets/images/png/add.png");
    $logout = Url::getReference("resources/assets/images/png/shutdown.png");
    $navbar->setNavItemIcons([
        "Log out" => $logout,
        "View rooms" => $open,
        "Add room" => $add,
    ]);
    $openClasses = "me-1 mb-1 md-small";
    $addClasses = "me-1 mb-1 md-small";
    $logoutClasses = "me-1 mb-1 md-small";
    $navbar->setNavItemIconClasses([
        "Log out" => $logoutClasses,
        "View rooms" => $openClasses,
        "Add room" => $addClasses,
    ]);
    $navbar->setNavBarUlClasses("ms-auto mt-2 mt-lg-0 mx-5");
    $navbar->setSeparator(false);
    $navbar->runSetup();
}