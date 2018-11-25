                <div class="resume-item d-flex flex-column flex-md-row mb-5">
                    <div class="resume-content mr-auto">
                        <h3 class="mb-0">{PROJECT.TOPIC}</h3>
                        <div class="subheading mb-3">
                            {PROJECT.PATH}
                            {PROJECT.URL}
                        </div>
                        <p>{PROJECT.CONTENT}</p>
                        <small>{PROJECT.VERSION}</small>
                    </div>
                    <div class="resume-date text-md-right mt-2">
                        <span class="text-primary">{PROJECT.CREATED} - {PROJECT.END}</span>
                        <ul>
                            <li>{BTN_EDIT_PROJECT}</li>
                            <li class="pl-2">{BTN_DELETE_PROJECT}</li>
                        </ul>
                    </div>
                </div>