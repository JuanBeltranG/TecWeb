function checaOtra() {
    if (document.getElementById("escuela_procedencia").value == "Otra") {
        document.getElementById("nombre_escuela").disabled = false;
        document.getElementById("nombre_escuela").required = true;
    }
    else {
        document.getElementById("nombre_escuela").disabled = true;
        document.getElementById("nombre_escuela").required = false;
    }
    document.getElementById("nombre_escuela").value = "";
    return;
}

function soloDigitos(campo_actual) {
    const validar_numerico = /^[0-9]+$/;
    if (!validar_numerico.test(document.getElementById(campo_actual).value)) {
        var extraidos = document.getElementById(campo_actual).value.length - 1;
        document.getElementById(campo_actual).value = document.getElementById(campo_actual).value.substr(0, extraidos);
    }
    return;
}

function soloLetras(campo_actual) {
    const validar_letras = /^[A-Za-z\u00c1\u00c9\u00cd\u00d3\u00da\u00d1\u00e1\u00e9\u00ed\u00f3\u00fa\u00f1]+$/;
    if (!validar_letras.test(document.getElementById(campo_actual).value)) {
        var extraidos = document.getElementById(campo_actual).value.length - 1;
        document.getElementById(campo_actual).value = document.getElementById(campo_actual).value.substr(0, extraidos);
    }
    return;
}

function alfanumerico(campo_actual) {
    const validar_alfanumerico = /^[A-Za-z0-9\u00c1\u00c9\u00cd\u00d3\u00da\u00d1\u00e1\u00e9\u00ed\u00f3\u00fa\u00f1]+$/;
    if (!validar_alfanumerico.test(document.getElementById(campo_actual).value)) {
        var extraidos = document.getElementById(campo_actual).value.length - 1;
        document.getElementById(campo_actual).value = document.getElementById(campo_actual).value.substr(0, extraidos);
    }
    return;
}

function alfanumericoYEspacios(campo_actual) {
    const validar_alfanumerico = /^[A-Za-z0-9\s\u00c1\u00c9\u00cd\u00d3\u00da\u00d1\u00e1\u00e9\u00ed\u00f3\u00fa\u00f1]+$/;
    if (!validar_alfanumerico.test(document.getElementById(campo_actual).value)) {
        var extraidos = document.getElementById(campo_actual).value.length - 1;
        document.getElementById(campo_actual).value = document.getElementById(campo_actual).value.substr(0, extraidos);
    }
    return;
}

function alfanumericoYEspaciosYPuntos(campo_actual) {
    const validar_alfanumerico = /^[A-Za-z0-9\s\.\u00c1\u00c9\u00cd\u00d3\u00da\u00d1\u00e1\u00e9\u00ed\u00f3\u00fa\u00f1]+$/;
    if (!validar_alfanumerico.test(document.getElementById(campo_actual).value)) {
        var extraidos = document.getElementById(campo_actual).value.length - 1;
        document.getElementById(campo_actual).value = document.getElementById(campo_actual).value.substr(0, extraidos);
    }
    return;
}

function validarRegistroDatos() {
    var flag = true;

    // Valida Boleta
    const validar_boleta = /^((PE)|(PP)|(\d{2}))\d{8}$/;
    flag = flag && validar_boleta.test(document.getElementById("boleta").value);
    if (!flag) {
        alert("La boleta debe de ser 10 dígitos o dos letras (PE o PP) y 8 dígitos");
        document.getElementById("boleta").focus();
        return flag;
    }

    // Valida Nombre
    const validar_nombre = /^[A-Z\u00c1\u00c9\u00cd\u00d3\u00da\u00d1]{1}[a-z\u00e1\u00e9\u00ed\u00f3\u00fa\u00f1]*$/;
    flag = flag && validar_nombre.test(document.getElementById("nombre").value);
    if (!flag) {
        alert("El nombre debe de constar de letras con la primera en mayúscula");
        document.getElementById("nombre").focus();
        return flag;
    }

    // Valida Apellido Paterno
    const validar_apellidoP = /^[A-Z\u00c1\u00c9\u00cd\u00d3\u00da\u00d1]{1}[a-z\u00e1\u00e9\u00ed\u00f3\u00fa\u00f1]*$/;
    flag = flag && validar_apellidoP.test(document.getElementById("apellido_p").value);
    if (!flag) {
        alert("El apellido paterno debe de constar de letras con la primera en mayúscula");
        document.getElementById("apellido_p").focus();
        return flag;
    }

    // Valida Apellido Materno
    const validar_apellidoM = /^[A-Z\u00c1\u00c9\u00cd\u00d3\u00da\u00d1]{1}[a-z\u00e1\u00e9\u00ed\u00f3\u00fa\u00f1]*$/;
    flag = flag && validar_apellidoM.test(document.getElementById("apellido_m").value);
    if (!flag) {
        alert("El apellido materno debe de constar de letras con la primera en mayúscula");
        document.getElementById("apellido_m").focus();
        return flag;
    }

    // Valida Genero
    if (document.getElementById("genero").value == "Ninguno") {
        alert("Debes de seleccionar tu genero");
        document.getElementById("genero").focus();
        return false;
    }

    // Valida CURP
    const validar_curp = /^[A-Z]{1}[AEIOU]{1}[A-Z]{2}\d{6}(H|M)[A-Z]{2}[BCDFGHJKLMNPQRSTVWXYZ]{3}[A-Z0-9]{1}\d{1}$/;
    flag = flag && validar_curp.test(document.getElementById("curp").value);
    if (!flag) {
        alert("El CURP no esta en el formato correcto");
        document.getElementById("curp").focus();
        return flag;
    }

    // Valida Calle y numero
    const validar_calle = /^[A-Za-z0-9\s\u00c1\u00c9\u00cd\u00d3\u00da\u00d1\u00e1\u00e9\u00ed\u00f3\u00fa\u00f1]+$/;
    flag = flag && validar_calle.test(document.getElementById("calle").value);
    if (!flag) {
        alert("Calle y numero solo debe de contener letras, numeros y espaciones");
        document.getElementById("calle").focus();
        return flag;
    }

    // Valida Colonia
    const validar_colonia = /^[A-Za-z0-9\s\u00c1\u00c9\u00cd\u00d3\u00da\u00d1\u00e1\u00e9\u00ed\u00f3\u00fa\u00f1]+$/;
    flag = flag && validar_colonia.test(document.getElementById("colonia").value);
    if (!flag) {
        alert("Colonia solo debe de tener letras, numeros y espacios");
        document.getElementById("colonia").focus();
        return flag;
    }

    // Valida Alcaldia
    if (document.getElementById("alcaldia").value == "Ninguna") {
        alert("Debes de seleccionar una alcaldia");
        document.getElementById("alcaldia").focus();
        return false;
    }

    // Valida Codigo Postal
    const validar_cp = /^\d{5}$/;
    flag = flag && validar_cp.test(document.getElementById("cp").value);
    if (!flag) {
        alert("El codigo postal dede de ser solo 5 digitos");
        document.getElementById("cp").focus();
        return flag;
    }

    // Valida Telefono o Celular
    const validar_telefono = /^\d{10}$/;
    flag = flag && validar_telefono.test(document.getElementById("telefono").value);
    if (!flag) {
        alert("El numero de telefono o celular dede de estar formado por 10 digitos");
        document.getElementById("telefono").focus();
        return flag;
    }

    // Valida Escuela de procedencia
    if (document.getElementById("escuela_procedencia").value == "Ninguna") {
        alert("Debes de seleccionar una escuela de procedencia");
        document.getElementById("escuela_procedencia").focus();
        return false;
    }

    // Valida Entidad de procedencia
    if (document.getElementById("entidad_procedencia").value == "Ninguna") {
        alert("Debes de seleccionar una entidad federativa de procedencia");
        document.getElementById("entidad_procedencia").focus();
        return false;
    }

    //Valida Otra Nombre de escuela
    if (document.getElementById("escuela_procedencia").value == "Otra") {
        const validar_nombreEscuela = /^[A-Za-z0-9\s\u00c1\u00c9\u00cd\u00d3\u00da\u00d1\u00e1\u00e9\u00ed\u00f3\u00fa\u00f1\.]+$/;
        flag = flag && validar_nombreEscuela.test(document.getElementById("nombre_escuela").value);
        if (!flag) {
            alert("El nombre de la escuela solo puede contener letras, numeros, espacios y puntos");
            document.getElementById("nombre_escuela").focus();
            return flag;
        }
        else {
            document.getElementById("EscuelaProcedencia").value = document.getElementById("nombre_escuela").value;
        }
    }
    else {
        document.getElementById("EscuelaProcedencia").value = document.getElementById("escuela_procedencia").value;
    }

    //Validad Escom opcion
    var op1 = 0, op2 = 0, op3 = 0, op4 = 0;
    if (document.getElementById("primera_opcion").checked) {
        op1 = 1;
        document.getElementById("EscomOpcion").value = document.getElementById("primera_opcion").value;
    }
    if (document.getElementById("segunda_opcion").checked) {
        op2 = 1;
        document.getElementById("EscomOpcion").value = document.getElementById("segunda_opcion").value;
    }
    if (document.getElementById("tercera_opcion").checked) {
        op3 = 1;
        document.getElementById("EscomOpcion").value = document.getElementById("tercera_opcion").value;
    }
    if (document.getElementById("cuarta_opcion").checked) {
        op4 = 1;
        document.getElementById("EscomOpcion").value = document.getElementById("cuarta_opcion").value;
    }
    if ((op1 + op2 + op3 + op4) != 1) {
        alert("Debes de indicar que opcion fue ESCOM marcando solo una casilla");
        return false;
    }

    return flag;
}