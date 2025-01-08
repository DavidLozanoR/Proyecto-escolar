/**
 * Diálogos de confirmación y respuesta SweetAlert2 que ejecuta una operación ajax enviando un formulario vía POST.
 * @param {form} form - La referencia al formulario.
 * @param {string} actionUrl - La dirección que procesará el formulario vía POST.
 * @param {string} titleQuestion - El título del díalogo de confirmación.
 * @param {string} textQuestion - El texto del díalogo de confirmación.
 * @param {string} titleResult - El título del díalogo de resultado.
 * @param {function} funcSuccess - Función a ejecutar luego de un procesamiento exitoso.
 * @param {function} argsFuncSuccess - Argumentos de la función a ejecutar.
 */
function asyncConfirmProcessForm(form, actionUrl, titleQuestion, textQuestion, titleResult, funcSuccess=null, argsFuncSuccess=null) {
	const formData = new FormData(form); // Crear objeto FormData con el formulario

	Swal.fire({
		title: titleQuestion,
		text: textQuestion,
		icon: "warning",
		showCancelButton: true,
		confirmButtonColor: "#3085d6",
		cancelButtonColor: "#d33",
		showLoaderOnConfirm: true,
		preConfirm: async () => {
			try {
				const response = await fetch(actionUrl, {
					method: "POST",
					body: formData, // Enviar el formulario directamente
				});

				if (!response.ok) {
					throw new Error(`Error: ${response.statusText}`);
				}

				const res = await response.json();

				if (res.result !== 1) {
					Swal.showValidationMessage(res.msg);
				}
				return res;
			} catch (error) {
				Swal.showValidationMessage(error.message);
			}
		},
		allowOutsideClick: () => !Swal.isLoading()
	}).then((result) => {
		if (result.isConfirmed) {
			Swal.fire({
				icon: "success",
				title: titleResult,
				text: result.value.msg,
				timer: 3000,
				timerProgressBar: true,
			}).then( (resp) => {
				if (funcSuccess != null && (resp.isConfirmed || resp.isDenied || resp.isDismissed) ) {
					funcSuccess(argsFuncSuccess);
				}
			})
		}
	});
}

/**
 * Diálogo de respuesta SweetAlert2 que ejecuta una operación ajax enviando un formulario vía POST.
 * @param {form} form - La referencia al formulario.
 * @param {string} actionUrl - La dirección que procesará el formulario vía POST.
 * @param {string} titleProcess - El título del díalogo de procesamiento.
 * @param {string} textProcess - El texto del díalogo de procesamiento.
 * @param {string} titleResult - El título del díalogo de resultado.
 * @param {function} funcSuccess - Función a ejecutar luego de un procesamiento exitoso.
 * @param {function} argsFuncSuccess - Argumentos de la función a ejecutar.
 */
function asyncProcessForm(form, actionUrl, titleProcess, textProcess, titleResult, funcSuccess=null, argsFuncSuccess=null) {
	const formData = new FormData(form); // Crear objeto FormData con el formulario

	Swal.fire({
		title: titleProcess,
		text: textProcess,
		icon: "info",
		allowOutsideClick: () => !Swal.isLoading(),
		showConfirmButton: false,
		didOpen: async () => {
			Swal.showLoading(); // Mostrar estado de carga
			try {
				// Enviar la petición asíncrona
				const response = await fetch(actionUrl, {
					method: "POST",
					body: formData,
				});

				// Verificar si la respuesta es válida
				if (!response.ok) {
					throw new Error(`Error: ${response.statusText}`);
				}

				const res = await response.json(); // Parsear respuesta JSON

				Swal.hideLoading(); // Ocultar el estado de carga

				// Verificar el resultado del procesamiento
				if (res.result === 1) {
					Swal.fire({
						icon: "success",
						title: titleResult,
						text: res.msg,
						timer: 3000,
						timerProgressBar: true,
						showConfirmButton: true,
					}).then(() => {
						// Ejecutar la función de éxito si fue proporcionada
						if (funcSuccess != null) {
							funcSuccess(argsFuncSuccess);
						}
					});
				} else {
					// Mostrar error en caso de fallo
					Swal.fire({
						icon: "error",
						title: "Error",
						text: res.msg || "Hubo un problema con el procesamiento.",
					});
				}
			} catch (error) {
				// Manejo de errores de la petición
				Swal.hideLoading();
				Swal.fire({
					icon: "error",
					title: "Error",
					text: error.message || "Error inesperado durante el procesamiento.",
				});
			}
		},
	});
}

/**
 * Crea un formulario de manera programática con base a un arreglo de JSON de forma (K,V)
 * @param {array[json(K,V)]} inputsJsonArray 
 * @param {string} actionUrl - La URL de procesamiento
 * @param {string} method - POST o GET
 * @returns El formulario creado de manera dinámica
 */
function createPreFilledForm(inputsJsonArray, actionUrl = "#", method = "POST") {
    // Crear el formulario
    const form = document.createElement("form");
    form.method = method;
    form.action = actionUrl;

    // Crear los inputs dinámicamente
    inputsJsonArray.forEach(({ name, value }) => {
        const input = document.createElement("input");
        input.type = "text";
        input.name = name;
        input.value = value;
        form.appendChild(input);
    });

    // Crear un botón para enviar el formulario
    const submitButton = document.createElement("button");
    submitButton.type = "submit";
    submitButton.textContent = "Enviar";

    // Agregar el botón al formulario
    form.appendChild(submitButton);

    return form;
}
