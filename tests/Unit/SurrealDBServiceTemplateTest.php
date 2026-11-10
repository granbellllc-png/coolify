<?php

it('includes a SurrealDB standalone service template', function () {
    $templatePath = __DIR__.'/../../templates/compose/surrealdb.yaml';

    expect($templatePath)->toBeFile();

    $compose = file_get_contents($templatePath);

    expect($compose)
        ->toContain('surrealdb/surrealdb')
        ->toContain('SERVICE_URL_SURREALDB_8000')
        ->toContain('SERVICE_PASSWORD_SURREALDB')
        ->toContain('rocksdb:/data')
        ->toContain('surrealdb-data:/data')
        ->toContain('isready');
});

it('includes a SurrealDB with TiKV service template', function () {
    $templatePath = __DIR__.'/../../templates/compose/surrealdb-with-tikv.yaml';

    expect($templatePath)->toBeFile();

    $compose = file_get_contents($templatePath);

    expect($compose)
        ->toContain('surrealdb/surrealdb')
        ->toContain('SERVICE_URL_SURREALDB_8000')
        ->toContain('SERVICE_PASSWORD_SURREALDB')
        ->toContain('tikv://pd:2379')
        ->toContain('pingcap/pd')
        ->toContain('pingcap/tikv')
        ->toContain('isready');
});

it('ships the SurrealDB service icon', function () {
    expect(__DIR__.'/../../public/svgs/surrealdb.svg')->toBeFile();
});
