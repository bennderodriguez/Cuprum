<?php

$idiuser = $globalIdiUsurio;
$idirole = $globalIdirole;
getPermisosFromGerencia($idiuser);
getPermisosAlumnos($idiuser);
getPermisosAdmision($idiuser);
getPermisosServicios($idiuser);
getPermisosControlEscolar($idiuser);
getReportes($idiuser, $idirole);
getCatalogos($idiuser, $idirole);
getPlanes($idiuser, $idirole);
getPermisosProfesores($idiuser);
getConfiguracion($idiuser, $idirole);

function getPermisosFromGerencia($idiuser) {
    include './dataConect/conexion.php';
    //$sql = "SELECT role.role, role_as_permiso.idipermiso, permiso.descripcion,permiso.permiso FROM role_as_permiso, role, permiso, user WHERE role_as_permiso.idirole = role.idirole AND role_as_permiso.idipermiso = permiso.idipermiso and role_as_permiso.idirole = user.idirole and user.idiuser =$idiuser";
    $sql = "SELECT role.role, role_as_permiso.idipermiso, permiso.descripcion,permiso.permiso FROM role_as_permiso, role, permiso, user WHERE role_as_permiso.idirole = role.idirole AND role_as_permiso.idipermiso = permiso.idipermiso and role_as_permiso.idirole = user.idirole and user.idiuser = $idiuser and permiso.categoria = 'Gerencia' and permiso.showInMenu='Si'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        echo '<li class="pcoded-hasmenu">
    <a href="javascript:void(0)">
        <span class="pcoded-micon"><i class="ti-medall"></i><b>G</b></span>
        <span class="pcoded-mtext" data-i18n="nav.page_layout.main">Gerencia</span>
        <span class="pcoded-mcaret"></span>
    </a>
    <ul class="pcoded-submenu">';
        while ($row = $result->fetch_assoc()) {
            // echo $row["permiso"];
            echo ' <li class="">
            <a href="' . $row["permiso"] . '">
                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                <span class="pcoded-mtext" data-i18n="nav.dash.default">' . $row["descripcion"] . '</span>
                <span class="pcoded-mcaret"></span>
            </a>
        </li>';
        }
        echo '    </ul>
</li>';
    } else {
        // echo "0 results";
    }
    $conn->close();
}

function getPermisosControlEscolar($idiuser) {
    include './dataConect/conexion.php';
    $sql = "SELECT role.role, role_as_permiso.idipermiso, permiso.descripcion,permiso.permiso FROM role_as_permiso, role, permiso, user WHERE role_as_permiso.idirole = role.idirole AND role_as_permiso.idipermiso = permiso.idipermiso and role_as_permiso.idirole = user.idirole and user.idiuser = $idiuser and permiso.categoria = 'Control escolar' and permiso.showInMenu='Si'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        echo '<li class="pcoded-hasmenu">
    <a href="javascript:void(0)">
        <span class="pcoded-micon"><i class="icofont icofont-school-bag"></i><b>CE</b></span>
        <span class="pcoded-mtext" data-i18n="nav.page_layout.main">Control Escolar</span>
        <span class="pcoded-mcaret"></span>
    </a>
    <ul class="pcoded-submenu">';
        while ($row = $result->fetch_assoc()) {
            // echo $row["permiso"];
            echo ' <li class="">
            <a href="' . $row["permiso"] . '">
                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                <span class="pcoded-mtext" data-i18n="nav.dash.default">' . $row["descripcion"] . '</span>
                <span class="pcoded-mcaret"></span>
            </a>
        </li>';
        }
        echo '    </ul>
</li>';
    } else {
        // echo "0 results";
    }
    $conn->close();
}

function getPermisosAdmision($idiuser) {
    include './dataConect/conexion.php';
    $sql = "SELECT role.role, role_as_permiso.idipermiso, permiso.descripcion,permiso.permiso FROM role_as_permiso, role, permiso, user WHERE role_as_permiso.idirole = role.idirole AND role_as_permiso.idipermiso = permiso.idipermiso and role_as_permiso.idirole = user.idirole and user.idiuser = $idiuser and permiso.categoria = 'Admisión' and permiso.showInMenu='Si'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        echo '<li class="pcoded-hasmenu">
    <a href="javascript:void(0)">
        <span class="pcoded-micon"><i class="ti-user"></i><b>A</b></span>
        <span class="pcoded-mtext" data-i18n="nav.page_layout.main">Admisión</span>
        <span class="pcoded-mcaret"></span>
    </a>
    <ul class="pcoded-submenu">';
        while ($row = $result->fetch_assoc()) {
            // echo $row["permiso"];
            echo ' <li class="">
            <a href="' . $row["permiso"] . '">
                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                <span class="pcoded-mtext" data-i18n="nav.dash.default">' . $row["descripcion"] . '</span>
                <span class="pcoded-mcaret"></span>
            </a>
        </li>';
        }
        echo '    </ul>
</li>';
    } else {
        // echo "0 results";
    }
    $conn->close();
}

function getPermisosAlumnos($idiuser) {
    include './dataConect/conexion.php';
    $sql = "SELECT role.role, role_as_permiso.idipermiso, permiso.descripcion,permiso.permiso FROM role_as_permiso, role, permiso, user WHERE role_as_permiso.idirole = role.idirole AND role_as_permiso.idipermiso = permiso.idipermiso and role_as_permiso.idirole = user.idirole and user.idiuser = $idiuser and permiso.categoria = 'Alumnos' and permiso.showInMenu='Si'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        echo '<li class="pcoded-hasmenu">
    <a href="javascript:void(0)">
        <span class="pcoded-micon"><i class="ti-id-badge"></i><b>Al</b></span>
        <span class="pcoded-mtext" data-i18n="nav.page_layout.main">Alumnos</span>
        <span class="pcoded-mcaret"></span>
    </a>
    <ul class="pcoded-submenu">';
        while ($row = $result->fetch_assoc()) {
            // echo $row["permiso"];
            echo ' <li class="">
            <a href="' . $row["permiso"] . '">
                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                <span class="pcoded-mtext" data-i18n="nav.dash.default">' . $row["descripcion"] . '</span>
                <span class="pcoded-mcaret"></span>
            </a>
        </li>';
        }
        echo '    </ul>
</li>';
    } else {
        // echo "0 results";
    }
    $conn->close();
}

function getPermisosServicios($idiuser) {
    include './dataConect/conexion.php';
    $sql = "SELECT role.role, role_as_permiso.idipermiso, permiso.descripcion,permiso.permiso FROM role_as_permiso, role, permiso, user WHERE role_as_permiso.idirole = role.idirole AND role_as_permiso.idipermiso = permiso.idipermiso and role_as_permiso.idirole = user.idirole and user.idiuser = $idiuser and permiso.categoria = 'Servicios' and permiso.showInMenu='Si'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        echo '<li class="pcoded-hasmenu">
    <a href="javascript:void(0)">
        <span class="pcoded-micon"><i class="ti-money"></i><b>S</b></span>
        <span class="pcoded-mtext" data-i18n="nav.page_layout.main">Servicios</span>
        <span class="pcoded-mcaret"></span>
    </a>
    <ul class="pcoded-submenu">';
        while ($row = $result->fetch_assoc()) {
            // echo $row["permiso"];
            echo ' <li class="">
            <a href="' . $row["permiso"] . '">
                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                <span class="pcoded-mtext" data-i18n="nav.dash.default">' . $row["descripcion"] . '</span>
                <span class="pcoded-mcaret"></span>
            </a>
        </li>';
        }
        echo '    </ul>
</li>';
    } else {
        // echo "0 results";
    }
    $conn->close();
}

function getCatalogosServiciosEscolares($idiuser) {
    include './dataConect/conexion.php';
    $sql = "SELECT role.role, role_as_permiso.idipermiso, permiso.descripcion,permiso.permiso FROM role_as_permiso, role, permiso, user WHERE role_as_permiso.idirole = role.idirole AND role_as_permiso.idipermiso = permiso.idipermiso and role_as_permiso.idirole = user.idirole and user.idiuser = $idiuser and permiso.categoria = 'Catálogos' and permiso.showInMenu='Si'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        echo '<li class="pcoded-hasmenu">
    <a href="javascript:void(0)">
        <span class="pcoded-micon"><i class="ti-money"></i><b>S</b></span>
        <span class="pcoded-mtext" data-i18n="nav.page_layout.main">Servicios Escolares</span>
        <span class="pcoded-mcaret"></span>
    </a>
    <ul class="pcoded-submenu">';
        while ($row = $result->fetch_assoc()) {
            // echo $row["permiso"];
            echo ' <li class="">
            <a href="' . $row["permiso"] . '">
                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                <span class="pcoded-mtext" data-i18n="nav.dash.default">' . $row["descripcion"] . '</span>
                <span class="pcoded-mcaret"></span>
            </a>
        </li>';
        }
        echo '    </ul>
</li>';
    } else {
        // echo "0 results";
    }
    $conn->close();
}

function getCatalogosControlEscolar($idiuser) {
    include './dataConect/conexion.php';
    $sql = "SELECT role.role, role_as_permiso.idipermiso, permiso.descripcion,permiso.permiso FROM role_as_permiso, role, permiso, user WHERE role_as_permiso.idirole = role.idirole AND role_as_permiso.idipermiso = permiso.idipermiso and role_as_permiso.idirole = user.idirole and user.idiuser = $idiuser and permiso.categoria = 'Catálogo_Escolares' and permiso.showInMenu='Si'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        echo '<li class="pcoded-hasmenu">
    <a href="javascript:void(0)">
        <span class="pcoded-micon"><i class="ti-money"></i><b>CE</b></span>
        <span class="pcoded-mtext" data-i18n="nav.page_layout.main">Control Escolar</span>
        <span class="pcoded-mcaret"></span>
    </a>
    <ul class="pcoded-submenu">';
        while ($row = $result->fetch_assoc()) {
            // echo $row["permiso"];
            echo ' <li class="">
            <a href="' . $row["permiso"] . '">
                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                <span class="pcoded-mtext" data-i18n="nav.dash.default">' . $row["descripcion"] . '</span>
                <span class="pcoded-mcaret"></span>
            </a>
        </li>';
        }
        echo '    </ul>
</li>';
    } else {
        // echo "0 results";
    }
    $conn->close();
}

function getPermisosProfesores($idiuser) {
    include './dataConect/conexion.php';
    $sql = "SELECT role.role, role_as_permiso.idipermiso, permiso.descripcion,permiso.permiso FROM role_as_permiso, role, permiso, user WHERE role_as_permiso.idirole = role.idirole AND role_as_permiso.idipermiso = permiso.idipermiso and role_as_permiso.idirole = user.idirole and user.idiuser = $idiuser and permiso.categoria = 'Profesores' and permiso.showInMenu='Si'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        echo '<li class="pcoded-hasmenu">
    <a href="javascript:void(0)">
        <span class="pcoded-micon"><i class="ti-ruler-pencil"></i><b>P</b></span>
        <span class="pcoded-mtext" data-i18n="nav.page_layout.main">Profesores</span>
        <span class="pcoded-mcaret"></span>
    </a>
    <ul class="pcoded-submenu">';
        while ($row = $result->fetch_assoc()) {
            // echo $row["permiso"];
            echo ' <li class="">
            <a href="' . $row["permiso"] . '">
                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                <span class="pcoded-mtext" data-i18n="nav.dash.default">' . $row["descripcion"] . '</span>
                <span class="pcoded-mcaret"></span>
            </a>
        </li>';
        }
        echo '    </ul>
</li>';
    } else {
        // echo "0 results";
    }
    $conn->close();
}

function getReportes($idiuser, $idirole) {
    if ($idirole == 2) {
        include './dataConect/conexion.php';
        $sql = "SELECT role.role, role_as_permiso.idipermiso, permiso.descripcion,permiso.permiso FROM role_as_permiso, role, permiso, user WHERE role_as_permiso.idirole = role.idirole AND role_as_permiso.idipermiso = permiso.idipermiso and role_as_permiso.idirole = user.idirole and user.idiuser = $idiuser and permiso.categoria = 'Reportes' and permiso.showInMenu='Si'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            // output data of each row
            echo '<li class="pcoded-hasmenu">
    <a href="javascript:void(0)">
        <span class="pcoded-micon"><i class="ti-stats-up"></i><b>R</b></span>
        <span class="pcoded-mtext" data-i18n="nav.page_layout.main">Reportes</span>
        <span class="pcoded-mcaret"></span>
    </a>
    <ul class="pcoded-submenu">';
            while ($row = $result->fetch_assoc()) {
                // echo $row["permiso"];
                echo ' <li class="">
            <a href="' . $row["permiso"] . '">
                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                <span class="pcoded-mtext" data-i18n="nav.dash.default">' . $row["descripcion"] . '</span>
                <span class="pcoded-mcaret"></span>
            </a>
        </li>';
            }
            echo '    </ul>
</li>';
        } else {
            // echo "0 results";
        }
        $conn->close();
    }
}

function getPlanes($idiuser, $idirole) {
    // if ($idirole == 2) {
    include './dataConect/conexion.php';
    $sql = "SELECT role.role, role_as_permiso.idipermiso, permiso.descripcion,permiso.permiso FROM role_as_permiso, role, permiso, user WHERE role_as_permiso.idirole = role.idirole AND role_as_permiso.idipermiso = permiso.idipermiso and role_as_permiso.idirole = user.idirole and user.idiuser = $idiuser and permiso.categoria = 'Planes de estudio' and permiso.showInMenu='Si'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        echo '<li class="pcoded-hasmenu">
    <a href="javascript:void(0)">
        <span class="pcoded-micon"><i class="ti-bookmark-alt"></i><b>Pl</b></span>
        <span class="pcoded-mtext" data-i18n="nav.page_layout.main">Planes de estudio</span>
        <span class="pcoded-mcaret"></span>
    </a>
    <ul class="pcoded-submenu">';
        while ($row = $result->fetch_assoc()) {
            // echo $row["permiso"];
            echo ' <li class="">
            <a href="' . $row["permiso"] . '">
                <span class="pcoded-micon"><i class="ti-ruler-pencil"></i></span>
                <span class="pcoded-mtext" data-i18n="nav.dash.default">' . $row["descripcion"] . '</span>
                <span class="pcoded-mcaret"></span>
            </a>
        </li>';
        }
        echo '    </ul>
</li>';
    } else {
        // echo "0 results";
    }
    $conn->close();
    // }
}

function getCatalogos($idiuser, $idirole) {
    if ($idirole == "2") {
        echo '<li class="pcoded-hasmenu">
            <a href="javascript:void(0)">
            <span class="pcoded-micon"><i class="ti-layout"></i><b>C</b></span>
            <span class="pcoded-mtext" data-i18n="nav.page_layout.main">Catálogos</span>
            <span class="pcoded-mcaret"></span>
            </a>
            <ul class="pcoded-submenu">';
        getCatalogosServiciosEscolares($idiuser);
        getCatalogosControlEscolar($idiuser);
        echo '</ul></li>';
    }
}

function getConfiguracion($idiuser, $idirole) {
    if ($idirole == 2) {
        include './dataConect/conexion.php';
        $sql = "SELECT role.role, role_as_permiso.idipermiso, permiso.descripcion,permiso.permiso FROM role_as_permiso, role, permiso, user WHERE role_as_permiso.idirole = role.idirole AND role_as_permiso.idipermiso = permiso.idipermiso and role_as_permiso.idirole = user.idirole and user.idiuser = $idiuser and permiso.categoria = 'Configuración' and permiso.showInMenu='Si'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            // output data of each row
            echo '<li class="pcoded-hasmenu">
    <a href="javascript:void(0)">
        <span class="pcoded-micon"><i class="ti-wand"></i><b>Conf</b></span>
        <span class="pcoded-mtext" data-i18n="nav.page_layout.main">Configuraciones</span>
        <span class="pcoded-mcaret"></span>
    </a>
    <ul class="pcoded-submenu">';
            while ($row = $result->fetch_assoc()) {
                // echo $row["permiso"];
                echo ' <li class="">
            <a href="' . $row["permiso"] . '">
                <span class="pcoded-micon"><i class="ti-angle-right"></i></span>
                <span class="pcoded-mtext" data-i18n="nav.dash.default">' . $row["descripcion"] . '</span>
                <span class="pcoded-mcaret"></span>
            </a>
        </li>';
            }
            echo '    </ul>
</li>';
        } else {
            // echo "0 results";
        }
        $conn->close();
    }
}
?>



