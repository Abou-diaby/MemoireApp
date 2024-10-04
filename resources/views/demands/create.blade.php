@extends('base')

@section('title', 'create')

@section('content')

<div class="container">
      <div class="row">
          <div class="col-xl-8 offset-xl-2 py-5">
              <h1 style="color: #ce0033;">Formulaire de validation de memoire à <a href="javascripti:void(0)">PIGIER</a>
              </h1>
              <p class="lead" >Pour la soumission de votre thème de mémoire, Renseignez ces champs ci dessous SVP !</p>
              <form action="{{ url('/demands') }}" method="post">
                @csrf
                  <div class="messages"></div>
                  <div class="controls">
                      <div class="row">
                          <div class="col-md-6">
                              <div class="form-group">
                                  <label for="form_name">Nom: *</label>
                                  <input id="name" type="text" name="name" class="form-control" placeholder="Veuillez entrer votre nom" required="required" data-error="Nom obligatoire.">
                                  <div class="help-block with-errors"></div>
                              </div>
                          </div>
                          <div class="col-md-6">
                              <div class="form-group">
                                  <label for="form_lastname">Prénom :*</label>
                                  <input id="lastname" type="text" name="lastname" class="form-control" placeholder="Veuillez entre votre prénom" required="required" data-error="Prénom obligatoire.">
                                  <div class="help-block with-errors"></div>
                              </div>
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-md-6">
                              <div class="form-group">
                                  <label for="form_email">Email :*</label>
                                  <input id="email" type="email" name="email" class="form-control" placeholder="Veuillez entrer votre email" required="required" data-error="Un email valide est obligatoire.">
                                  <div class="help-block with-errors"></div>
                              </div>
                          </div>

                          <div class="col-md-6">
                            <div class="form-group">
                                <label for="form_tel">Téléphone :*</label>
                                <input id="tel" type="tel" name="tel" class="form-control" placeholder="Veuillez entrer votre Numero de téléphone" required="required" data-error="Un Numero valide est obligatoire.">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="form_matricule">Matricule :*</label>
                                <input id="matricule" type="tel" name="matricule" class="form-control" placeholder="Veuillez entrer votre Matricule" required="required" data-error="Matricule valide obligatoire.">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="form_class">Classe :*</label>
                                <input id="class" type="text" name="class" class="form-control" placeholder="Veuillez entrer votre Classe" required="required" data-error="Classe obligatoire.">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="form_parcours">Parcours :*</label>
                                <input id="parcours" type="text" name="parcours" class="form-control" placeholder="Veuillez entrer votre Parcours" required="required" data-error="Parcours obligatoire">
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="form_session">Session :*</label>
                                    <input id="session" type="text" name="session" class="form-control" placeholder="Veuillez entrer la session" required="required" data-error="Session obligatoire">
                                    <div class="help-block with-errors"></div>
                                </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="Libellé du Thème">Libellé du Thème :*</label>
                        <input type="text" class="form-control" id="theme" name="theme" required>
                    </div>
                    <div class="form-group">
                        <label for="description">Problématique :*</label>
                        <textarea class="form-control" id="Problematique" name="problematique" rows="5" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="description">Objectif général :*</label>
                        <textarea class="form-control" id="objectif_general" name="objectif_general" rows="5" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="description">Objectifs spécifiques :*</label>
                        <textarea class="form-control" id="objectifs_specifiques" name="objectifs_specifiques" rows="5" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="description">Resultats attendus :*</label>
                        <textarea class="form-control" id="resultats_attendus" name="resultats_attendus" rows="8" required></textarea>
                    </div>
                      <div class="row">
                          <div class="col-md-12">
                              <p class="text-muted">
                                  <strong>*</strong> Ces champs sont obligatoires.</p>
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-md-12">
                            <!-- Bouton Retour -->
                            <a href="{{ route('app_dashboard') }}" class="btn btn-secondary">Retour</a>
                          <button type="submit" class="btn btn-primary">Soumettre</button>
                          </div>
                      </div>

                  </div>

              </form>

          </div>
          <!-- /.8 -->

      </div>
      <!-- /.row-->

  </div>
  <!-- /.container-->
@endsection
