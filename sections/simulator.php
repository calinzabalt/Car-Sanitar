<section id="simulator" class="simulator">
    <div class="container">
        <div class="col-wrapper">
            <div class="col-50 small-desktop-col-100">
                <div class="loan-inner">
                    <h3 class="loan-title"><?php echo get_sub_field('section_title');?></h3>
                    <?php echo get_sub_field('section_description');?>
                </div>
            </div>
            <div class="col-50 small-desktop-col-100">             
                <form id="loan-form" class="contact-form">
                    <div class="contact-form-inner">
                        <div class="form-group">
                            <label for="loan-type">Tip Împrumut:</label>
                            <select id="loan-type" required>
                                <option value="traditional">Tradițional</option>
                                <option value="diversificat">Diversificat</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="amount">Suma (lei):</label>
                            <input type="number" id="amount" min="0" max="100000" required>
                        </div>

                        <div class="form-group">
                            <label for="periods">Perioada (luni):</label>
                            <input type="number" id="periods" min="1" max="60" required>
                        </div>

                        <div class="form-group">
                            <label for="collection-day">Zi de Încasare (doar Diversificat):</label>
                            <input type="number" id="collection-day" min="1" max="31" value="20" placeholder="ex. 20">
                        </div>

                        <button type="submit" class="cta-button">Calculează</button>
                    </div>
                </form>
            </div>
        </div>
        <div id="results" style="display:none;">
            <h4 class="loan-title">Grafic Rambursare</h4>
            <div class="simple-content">
                <table id="schedule-table">
                    <thead>
                        <tr>
                            <th data-col-size="sm">Luna</th>
                            <th>Data</th>
                            <th data-col-size="lg">Sold Împrumut</th>
                            <th data-col-size="sm">Rata Împrumut</th>
                            <th data-col-size="sm">Dobândă Lunară</th>
                            <th data-col-size="sm">Total de Plată/Lună</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
            <div id="summary" class="simple-content"></div>
            <button id="export-csv" class="cta-button">Exportă CSV</button>
        </div>
    </div>
</section>