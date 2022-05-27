require('../bootstrap');

import {plusMinusButton} from "./scripts/plusMinusButton.js";
import {ckeditor} from "./scripts/ckeditor.js";
import {renderForm} from "./scripts/form.js";
import {renderTable} from "./scripts/table.js";
import {closeElement} from "./scripts/closeElement.js";
import {tabs} from "./scripts/tabs.js";
import {savedChangesStatus} from "./scripts/savedChangesStatus.js";
import {events} from "./scripts/events.js";
import {faqs} from "./scripts/faqs.js";

plusMinusButton();
renderForm();
// renderTable();
ckeditor();
closeElement();
tabs();
savedChangesStatus();
events();
faqs();