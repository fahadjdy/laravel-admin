                <div class="row">
                        <form action="" method="post" id="bioDataForm">
                            @csrf
                            @method('put')
                            <table class="table table-striped bio-data-table">
                                <tbody>
                                    <tr>
                                        <td width="10%" class="text-primary bio-data-label" >Name :</td>
                                        <td>
                                            <span id="name-text" class="text-muted">Altron</span>
                                            <input type="text" id="name" name="name" class="form-control d-none " value="Altron">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="10%" class="text-primary bio-data-label" >Slogan :</td>
                                        <td>
                                            <span id="slogan-text" class="text-muted">We deliver the quality</span>
                                            <input type="text" id="slogan" name="slogan" class="form-control d-none " value="We deliver the quality">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="10%" class="text-primary bio-data-label" >Email :</td>
                                        <td>
                                            <span id="email-text" class="text-muted">fahadjdy@gmail.com</span>
                                            <input type="email" id="email" name="email" class="form-control d-none " value="fahadjdy@gmail.com">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="10%" class="text-primary bio-data-label" >Contact :</td>
                                        <td>
                                            <span id="contact-text" class="text-muted">9054479848</span>
                                            <input type="number" id="contact" name="contact" class="form-control d-none " value="9054479848">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="10%" class="text-primary bio-data-label" >Address :</td>
                                        <td>
                                            <span id="address-text" class="text-muted">basu</span>
                                            <input type="text" id="address" name="address" class="form-control d-none " value="basu">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="10%" class="text-primary bio-data-label" >Fevicon :</td>
                                        <td>
                                            <div class="position-relative">
                                                <img src="{{ asset('author/fhd-favicon.png') }}" width="50px" height="50px" id="favicon-img" >
                                                <div class="favicon-img-overlay position-absolute ">
                                                    <div class="circle">
                                                        <i class="fa-duotone fa-solid fa-camera" id="favicon-icon"></i>
                                                        <input type="file" class="d-none" id="favicon-file" name="favicon" accept="image/*">
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>        
                        </form>

                </div>                                                                                                              