for /d %%d in (tests\*) do (
    for %%f in (%%d\Test*) do (
        php %%f
    )
)