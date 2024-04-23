<?php
template('header', array(
    'title' => 'Boite à outils • Pourcentage',
));
?>

<!-- ======= Percent Section ======= -->
<section id="percent" class="percent ms-5 me-5">
    <div class="container">
        <div class="section-title">
            <h2>Calcul de pourcentage</h2>
            <p>La calculatrice de pourcentage vous permet de calculer facilement le pourcentage de n'importe quel chiffre avec la calculatrice de pourcentage en ligne, une calculatrice utile et simple à utiliser.</p>
        </div>

        <div class="row">

            <fieldset class="col-12 mt-2 p-3">
                <legend>Calculer la quantité</legend>
                <form action="" method="POST" name="percent">
                    <div class="row">
                        <div class="col-2">
                            <label for="percent" class="form-label visually-hidden">Pourcentage</label>
                            <div class="input-group">
                                <input id="percent" name="percent" type="text" class="form-control" required value="50">
                                <div class="input-group-append">
                                    <div class="input-group-text">%</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-2">
                            <label for="of" class="form-label visually-hidden">Nombre</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">de</div>
                                </div>
                                <input id="of" name="of" type="text" class="form-control" required value="50">
                            </div>
                        </div>

                        <div class="col-auto align-self-center">
                            <span class="ver">=</span>
                        </div>

                        <div class="col-3">
                            <label for="result" class="form-label visually-hidden">Résultat</label>
                            <div class="input-group">
                                <input id="result" name="result" type="text" class="form-control" disabled>
                            </div>
                        </div>

                        <div class="col">
                            <button name="submit" type="submit" class="btn btn-primary btn-block">Calculer</button>
                        </div>
                    </div>
                </form>
            </fieldset>


            <fieldset class="col-12 mt-4 p-3">
                <legend>Calculer le nombre initial</legend>
                <form action="" method="POST" name="percent">
                    <div class="row">
                        <div class="col-2">
                            <label for="result" class="form-label visually-hidden">Nombre</label>
                            <div class="input-group">
                                <input id="result" name="result" type="text" class="form-control" required value="10">
                            </div>
                        </div>


                        <div class="col-auto align-self-center">
                            <span class="ver">est le</span>
                        </div>

                        <div class="col-2">
                            <label for="percent" class="form-label visually-hidden">Nombre</label>
                            <div class="input-group">
                                <input id="percent" name="percent" type="text" class="form-control" required value="10">
                                <div class="input-group-append">
                                    <div class="input-group-text">%</div>
                                </div>
                            </div>
                        </div>


                        <div class="col-auto align-self-center">
                            <span class="ver">de</span>
                        </div>


                        <div class="col-3">
                            <label for="of" class="form-label visually-hidden">Résultat</label>
                            <div class="input-group">
                                <input id="of" name="of" type="text" class="form-control" disabled>
                            </div>
                        </div>

                        <div class="col">
                            <button name="submit" type="submit" class="btn btn-primary btn-block">Calculer</button>
                        </div>
                    </div>
                </form>
            </fieldset>

            <fieldset class="col-12 mt-4 p-3">
                <legend>Calculer le pourcentage</legend>
                <form action="" method="POST" name="percent">
                    <div class="row">
                        <div class="col-2">
                            <label for="of" class="form-label visually-hidden">Nombre</label>
                            <div class="input-group">
                                <input id="of" name="of" type="text" class="form-control" required>
                            </div>
                        </div>


                        <div class="col-auto align-self-center">
                            <span class="ver">est le</span>
                        </div>

                        <div class="col-2">
                            <label for="percent" class="form-label visually-hidden">Nombre</label>
                            <div class="input-group">
                                <input id="percent" name="percent" type="text" class="form-control" disabled>
                                <div class="input-group-append">
                                    <div class="input-group-text">%</div>
                                </div>
                            </div>
                        </div>


                        <div class="col-auto align-self-center">
                            <span class="ver">de</span>
                        </div>


                        <div class="col-3">
                            <label for="result3" class="form-label visually-hidden">Résultat</label>
                            <div class="input-group">
                                <input id="result" name="result" type="text" class="form-control" required>
                            </div>
                        </div>

                        <div class="col">
                            <button name="submit" type="submit" class="btn btn-primary btn-block">Calculer</button>
                        </div>
                    </div>
                </form>
            </fieldset>
        </div>
    </div>
</section><!-- End Percent Section -->


<script type="text/javascript">
    window.addEventListener('load', () => {
        let forms = document.forms;

        for (form of forms) {
            form.addEventListener('submit', async (event) => {
                event.preventDefault();

                const formData = new FormData(event.target).entries()

                const response = await fetch('/api/post', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify(
                        Object.assign(Object.fromEntries(formData), {
                            form: event.target.name
                        })
                    )
                });

                const result = await response.json();

                let inputName = Object.keys(result.data)[0];

                event.target.querySelector(`input[name="${inputName}"]`).value = result.data[inputName];
            });
        }
    });
</script>

<?php template('footer');
