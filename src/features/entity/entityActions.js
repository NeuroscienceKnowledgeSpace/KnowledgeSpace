import { ENTITY_UPDATE, ENTITY_FOUND, ENTITY_LOADED } from './entityConstants';

export const updateEntity = (curie) => ({
  type: ENTITY_UPDATE,
  curie
});

export const loadEntity = (entity) => ({
  type: ENTITY_FOUND,
  entity
});
