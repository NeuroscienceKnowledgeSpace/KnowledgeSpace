// SAGAS
import {updateEntity} from 'features/entity/entitySaga'
import {submitAutosuggest} from 'features/autosuggest/autosuggestSaga'
import {aggregateDataSpace} from 'features/dataSpaceAggs/dataSpaceAggsSaga'
import {updateEntityAndSearchDS, searchDSByEntity, paginateDSSearch} from 'features/dataSpace/dataSpaceSaga'
import {submitSearch, paginateSearch} from 'features/entitySearch/entitySearchSaga'
import {searchLiteratureByPath, searchLiterature, paginateLiterature} from 'features/literature/literatureSaga'

// CONSTANTS
import {ENTITY_UPDATE, ENTITY_FOUND} from 'features/entity/entityConstants'
import {ENTITY_SEARCH_SUBMITTED,
  ENTITY_SEARCH_RESULTS_RECEIVED,
  ENTITY_SEARCH_PAGINATED
} from 'features/entitySearch/entitySearchConstants'
import {AUTOSUGGEST_SUBMITTED, AUTOSUGGEST_RESULTS_RECEIVED} from 'features/autosuggest/autosuggestConstants'
import {DS_ENTITY_UPDATE, DS_ENTITY_FOUND, DS_SEARCH_SUBMITTED, DS_SEARCH_PAGINATED} from 'features/dataSpace/dataSpaceConstants'
import {LITERATURE_SEARCH_SUBMITTED, LITERATURE_SEARCH_PAGINATED} from 'features/literature/literatureConstants'
import {takeLatest} from 'redux-saga/effects'
import { BRAIN_REGION_SEARCH_SUBMITTED } from '../../features/brainRegion/brainRegionSearchConstants'
import { submitBrainRegionSearch } from '../../features/brainRegion/brainRegionSearchSaga'

// Watches for ENTITY_UPDATE action type asynchronously
export function * watchEntity() {
  yield takeLatest(ENTITY_UPDATE, updateEntity)
}

// Weatches for the ENTITY_FOUND action and triggers a dataspace search.
export function * watchEntityFound() {
  yield takeLatest(ENTITY_FOUND, searchLiteratureByPath)
  yield takeLatest(ENTITY_FOUND, aggregateDataSpace)
}

// Watches for DS_ENTITY_UPDATE action type asynchronously
export function * watchDSEntity() {
  yield takeLatest(DS_ENTITY_UPDATE, updateEntityAndSearchDS)
}

// Watches for DS_ENTITY_FOUND action type asynchronously
export function * watchDSEntityFound() {
  yield takeLatest(DS_ENTITY_FOUND, searchDSByEntity)
}

// Watches for DS_ENTITY_FOUND action type asynchronously
export function * watchDSFilter() {
  yield takeLatest(DS_SEARCH_SUBMITTED, searchDSByEntity)
}

// Watches for LITERATURE_SEARCH_SUBMITTED action type asynchronously
export function * watchLiteratureFilter() {
  yield takeLatest(LITERATURE_SEARCH_SUBMITTED, searchLiterature)
}

// Watches for  action type asynchronously
export function * watchDSPaginate() {
  yield takeLatest(DS_SEARCH_PAGINATED, paginateDSSearch)
}

// Watches for  action type asynchronously
//
export function * watchLiteraturePaginate() {
  yield takeLatest(LITERATURE_SEARCH_PAGINATED, paginateLiterature)
}

// Watches for ENTITY_SEARCH_SUBMITTED action type asynchronously
export function * watchSearch() {
  yield takeLatest(ENTITY_SEARCH_SUBMITTED, submitSearch)
}

// Watches for ENTITY_SEARCH_SUBMITTED action type asynchronously
export function * watchAutosuggest() {
  yield takeLatest(AUTOSUGGEST_SUBMITTED, submitAutosuggest)
}

// Watches for  action type asynchronously
export function * watchPaginate() {
  yield takeLatest(ENTITY_SEARCH_PAGINATED, paginateSearch)
}


// Watches for BRAIN_REGION_SEARCH_SUBMITTED action type asynchronously
export function * watchBrainRegionSearch() {
  yield takeLatest(BRAIN_REGION_SEARCH_SUBMITTED, submitBrainRegionSearch)
}