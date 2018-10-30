import { put, call } from 'redux-saga/effects';
import { queryAllByEntity } from "clients/DataSpaceClient";
import { DATASPACE_AGGS_FOUND } from './dataSpaceAggsConstants';

export function* aggregateDataSpace({payload}) {
  try {
    const aggs = yield call(queryAllByEntity, payload);
    yield put({ type: DATASPACE_AGGS_FOUND , payload: aggs });
  } catch (err) {
    yield put({ type: 'DATASPACE_AGGS_ERROR', err}); 
  }
}
